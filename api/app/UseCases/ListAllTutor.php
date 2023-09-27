<?php

class ListAllTutor {
    public function __construct(private TutorRepositoryInterface $tutorRepository, private PeopleRepositoryInterface $peopleRepository, private AddressRepositoryInterface $addressRepository) {
    }

    public function execute(): array {
        // Retrieve a list of tutors
        $tutors = $this->tutorRepository->getAll();
        $people = $this->peopleRepository->getAll();
        $addresses = $this->addressRepository->getAll(); // Assuming you have a getAll() method in PeopleRepositoryInterface

        $tutorsWithPeople = [];

        $tutorsWithPeople = [];

foreach ($tutors as $tutor) {
    $tutorCpf = $tutor->get_cpf(); // Assuming your Tutor object has a getCpf() method
    $tutorArray = [
        'id_tutor' => $tutor->get_idTutor(),
        'status' => $tutor->get_status(),
        'cpf_pessoa' => $tutor->get_cpf(),
        'dtregistro' => $tutor->get_dtregistro(),
    ];

    // Initialize the person array
    $personArray = null;
    $addressArray = null;

    foreach ($people as $person) {
        $personCpf = $person->get_cpf(); // Assuming your People object has a getCpf() method

        if ($tutorCpf === $personCpf) {
            $personArray = [
                'cpf' => $person->get_cpf(),
                'nome' => $person->get_nome(),
                'rg' => $person->get_rg(),
                'telefone' => $person->get_telefone(),
                'email' => $person->get_email(),
                'fkendereco' => $person->get_endereco()->getId(),
                'tipo' => $person->get_tipo(),
                'dtnasc' => $person->get_dt_nasc(),
            ];
            $personAddr = $person->get_endereco()->getId();
            
            foreach ($addresses as $address) {
                $addressId = $address->getId();

                if($addressId === $personAddr)
                {
                    $addressArray = [
                        'id' => $address->getId(),
                        'cep' => $address->get_cep(),
                        'rua' => $address->get_logradouro(),
                        'num_casa' => $address->get_num_casa(),
                        'cidade' => $address->get_cidade(),
                        'estado' => $address->get_estado(),
                        'bairro' => $address->get_bairro(),
                    ];
                }
            }

            // No need to continue checking once a match is found
            break;
        }
    }

    if ($personArray !== null) {
        // Match found, add this pair to the array
        $tutorWithPerson = [
            'tutor' => $tutorArray,
            'person' => $personArray,
            'address' => $addressArray
        ];

        $tutorsWithPeople[] = $tutorWithPerson;
    }
}

        
        

        return $tutorsWithPeople;
    }
    
}
