<?php
namespace App\Repositories;

use App\Repositories\Contracts\CriaturaRepository as RepoContract;
use App\Models\Criatura;

class CriaturaRepository implements RepoContract
{
	/** @var Criatura */
	protected $criatura;

	/**
	 * @param Criatura $criatura
	 */
	public function __construct(Criatura $criatura)
	{
		$this->criatura = $criatura;
	}

	/**
	 * @return Criatura[]
	 */
	public function all()
	{
		return Criatura::all();
	}

	/**
	 * @return Criatura[]
	 */
	public function withAllRelationships()
	{
		return Criatura::with('habitat')->get();
	}

	/**
	 * @param int $id
	 * @return Criatura
	 */
	public function find($id)
	{
		return Criatura::find($id);
	}
	
	/**
	 * @param array $data
	 */
	public function create($data)
	{
		return Criatura::create($data);
	}
	
	/**
	 * @param int $id
	 * @param array $data
	 */
	public function update($id, $data)
	{
		return Criatura::find($id)->update($data);
	}
	
	/**
	 * @param int $id
	 */
	public function delete($id)
	{
		return Criatura::find($id)->delete();
	}
	
}