<?php
namespace App\Repositories\Contracts;

interface CriaturaRepository
{
	/*Acciones que necesitamos realizar con la base de datos*/
	
	/**
	 * @return Criatura[]
	 */
	public function all();
	
	/**
	 * @return Criatura[]
	 */
	public function withAllRelationships();
	
	/**
	 * @param int $id
	 * @return Criatura
	 */
	public function find($id);
	
	/**
	 * @param array $data
	 */
	public function create($data);
	
	/**
	 * @param int $id
	 * @param array $data
	 */
	public function update($id, $data);
	
	/**
	 * @param int $id
	 */
	public function delete($id);
	
}