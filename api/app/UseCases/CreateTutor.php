<?php
require_once('../Infrastructure/TutorRepository.php');
require_once('../Infrastructure/PeopleRepository.php');
require_once('../Infrastructure/AddressRepository.php');

require_once '../vendor/autoload.php';





class CreateTutor
{
    public function __construct(private TutorRepositoryInterface $tutorRepository, private PeopleRepositoryInterface $peopleRepository, private AddressRepositoryInterface $addressRepository) {

    }

    public function execute(array $tutorData): array {
        // Business logic to create a user
        $endereco = new Address($tutorData['cep'],
                                $tutorData['rua'],
                                $tutorData['num_da_casa'],
                                $tutorData['cidade'],
                                $tutorData['estado'],
                                $tutorData['bairro']);
        $address = $this->addressRepository->save($endereco);
        $endereco->setId($address['id']);
        
        $return = [];
        
        
        
        $tutor = new Tutor(
                            $tutorData['status'],
                            $tutorData['dtregistro'],
                            $tutorData['cpf'],
                            $tutorData['nome'],
                            $tutorData['rg'],
                            $tutorData['telefone'],
                            $tutorData['email'],
                            $tutorData['tipo'],
                            $tutorData['dtnasc'],
                            $endereco);
                            $check = $this->peopleRepository->save($tutor);
                            
                            if(in_array("CPF Already exists.", $check))
                            {
                                $return = [$check];
                            }else { $return = ["Person" => $check,
                                "Tutor" => $this->tutorRepository->save($tutor),
                                "Endereco" => $address];}
        
        
        
        
           
        
                            
        

        return $return;
    }

}