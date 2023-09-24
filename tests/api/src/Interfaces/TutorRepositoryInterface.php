<?php
interface TutorRepositoryInterface{

    public function checkTable(): bool;

    public function save(Tutor $tutor): void;

    public function getById(int $Id): ?Tutor;

    public function getAll(): array;

    public function delete(Tutor $tutor): void;

    public function search(string $query): array;

    public function update(Tutor $tutor): void;
}