<?php

use App\Models\Veiculo;
use App\Repositories\VeiculoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VeiculoRepositoryTest extends TestCase
{
    use MakeVeiculoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var VeiculoRepository
     */
    protected $veiculoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->veiculoRepo = App::make(VeiculoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateVeiculo()
    {
        $veiculo = $this->fakeVeiculoData();
        $createdVeiculo = $this->veiculoRepo->create($veiculo);
        $createdVeiculo = $createdVeiculo->toArray();
        $this->assertArrayHasKey('id', $createdVeiculo);
        $this->assertNotNull($createdVeiculo['id'], 'Created Veiculo must have id specified');
        $this->assertNotNull(Veiculo::find($createdVeiculo['id']), 'Veiculo with given id must be in DB');
        $this->assertModelData($veiculo, $createdVeiculo);
    }

    /**
     * @test read
     */
    public function testReadVeiculo()
    {
        $veiculo = $this->makeVeiculo();
        $dbVeiculo = $this->veiculoRepo->find($veiculo->id);
        $dbVeiculo = $dbVeiculo->toArray();
        $this->assertModelData($veiculo->toArray(), $dbVeiculo);
    }

    /**
     * @test update
     */
    public function testUpdateVeiculo()
    {
        $veiculo = $this->makeVeiculo();
        $fakeVeiculo = $this->fakeVeiculoData();
        $updatedVeiculo = $this->veiculoRepo->update($fakeVeiculo, $veiculo->id);
        $this->assertModelData($fakeVeiculo, $updatedVeiculo->toArray());
        $dbVeiculo = $this->veiculoRepo->find($veiculo->id);
        $this->assertModelData($fakeVeiculo, $dbVeiculo->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteVeiculo()
    {
        $veiculo = $this->makeVeiculo();
        $resp = $this->veiculoRepo->delete($veiculo->id);
        $this->assertTrue($resp);
        $this->assertNull(Veiculo::find($veiculo->id), 'Veiculo should not exist in DB');
    }
}
