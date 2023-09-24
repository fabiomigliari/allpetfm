<?php
require_once('../Infrastructure/TutorRepository.php');
require_once('../Infrastructure/PeopleRepository.php');
class CreateTutor
{
    public function __construct(private TutorRepositoryInterface $tutorRepository, private PeopleRepositoryInterface $peopleRepository) {

    }

    public function execute(array $tutorData): Tutor {
        // Business logic to create a user
        $endereco = new Address($tutorData['fkendereco']);
        
        

        $tutor = new Tutor($tutorData['id_tutor'],
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
        $this->peopleRepository->save($tutor);
        $this->tutorRepository->save($tutor);

        return $tutor;
    }

}