<?php

use Faker\Factory as Faker;
use App\Models\Veiculo;
use App\Repositories\VeiculoRepository;

trait MakeVeiculoTrait
{
    /**
     * Create fake instance of Veiculo and save it in database
     *
     * @param array $veiculoFields
     * @return Veiculo
     */
    public function makeVeiculo($veiculoFields = [])
    {
        /** @var VeiculoRepository $veiculoRepo */
        $veiculoRepo = App::make(VeiculoRepository::class);
        $theme = $this->fakeVeiculoData($veiculoFields);
        return $veiculoRepo->create($theme);
    }

    /**
     * Get fake instance of Veiculo
     *
     * @param array $veiculoFields
     * @return Veiculo
     */
    public function fakeVeiculo($veiculoFields = [])
    {
        return new Veiculo($this->fakeVeiculoData($veiculoFields));
    }

    /**
     * Get fake data of Veiculo
     *
     * @param array $postFields
     * @return array
     */
    public function fakeVeiculoData($veiculoFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'modelo' => $fake->word,
            'placa' => $fake->word,
            'chassi' => $fake->word,
            'cor' => $fake->word,
            'ano' => $fake->word,
            'observacao' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $veiculoFields);
    }
}
