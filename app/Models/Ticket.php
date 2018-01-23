<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    
    /**
     * @var array
     */
    protected $states =  [
                'AC', // Acre
                'AL', // Alagoas
                'AP', // Amapá
                'AM', // Amazonas
                'BA', // Bahia
                'CE', // Ceará
                'DF', // Distrito Federal
                'ES', // Espírito Santo
                'GO', // Goiás
                'MA', // Maranhão
                'MT', // Mato Grosso
                'MS', // Mato Grosso do Sul
                'MG', // Minas Gerais
                'PA', // Pará
                'PB', // Paraíba
                'PR', // Paraná
                'PE', // Pernambuco
                'PI', // Piauí
                'RR', // Roraima
                'RO', // Rondônia
                'RJ', // Rio de Janeiro
                'RN', // Rio Grande do Norte
                'RS', // Rio Grande do Sul
                'SC', // Santa Catarina
                'SP', // São Paulo
                'SE', // Sergipe
                'TO'  // Tocantins
    ];
    
    /**
     * @var array
     */
    protected $types =  [
            'Telefone',
            'Chat',
            'Email'
    ];

    /**
     * @var array
     */
    protected $subjects =  [
            'Dúvidas',
            'Elogios',
            'Sugestões'
    ];
    
    /**
     * Returns a array of Brazil's states
     *
     * @return Array
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * Returns an array of contact types
     *
     * @return Array
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Returns an array of Subjects
     *
     * @return void
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

}
