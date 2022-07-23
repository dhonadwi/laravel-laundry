<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $name, $title, $description;

    public function mount($params)
    {
        $this->name = $params['name'];
        $this->title = $params['title'];
        $this->description = $params['description'];
    }
    public function render()
    {
        return view('livewire.modal',[
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description
        ]);
    }
}
