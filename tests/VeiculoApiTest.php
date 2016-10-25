<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VeiculoApiTest extends TestCase
{
    use MakeVeiculoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateVeiculo()
    {
        $veiculo = $this->fakeVeiculoData();
        $this->json('POST', '/api/v1/veiculos', $veiculo);

        $this->assertApiResponse($veiculo);
    }

    /**
     * @test
     */
    public function testReadVeiculo()
    {
        $veiculo = $this->makeVeiculo();
        $this->json('GET', '/api/v1/veiculos/'.$veiculo->id);

        $this->assertApiResponse($veiculo->toArray());
    }

    /**
     * @test
     */
    public function testUpdateVeiculo()
    {
        $veiculo = $this->makeVeiculo();
        $editedVeiculo = $this->fakeVeiculoData();

        $this->json('PUT', '/api/v1/veiculos/'.$veiculo->id, $editedVeiculo);

        $this->assertApiResponse($editedVeiculo);
    }

    /**
     * @test
     */
    public function testDeleteVeiculo()
    {
        $veiculo = $this->makeVeiculo();
        $this->json('DELETE', '/api/v1/veiculos/'.$veiculo->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/veiculos/'.$veiculo->id);

        $this->assertResponseStatus(404);
    }
}
