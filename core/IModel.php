<?php

namespace App\Core;

interface IModel
{
  //Abstraites
  //instances
  public function update(): int;
  public function insert(): int;
  //static
  public static function delete(int $id): int;
  public static function findAll(): array;
  public static function findById(int $id): object|null;
  public  static function findBy(string $sql, array $data = [], $single = false): object|null|array;
}
