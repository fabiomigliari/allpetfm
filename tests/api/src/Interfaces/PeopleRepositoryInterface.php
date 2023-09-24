<?php
interface PeopleRepositoryInterface{

    public function checkTable(): bool;

    public function save(People $pessoa): void;

    public function getByCpf(string $cpf): ?People;

    public function getAll(): array;

    public function delete(People $pessoa): void;

    public function search(string $query): array;

    public function update(People $pessoa): void;
}