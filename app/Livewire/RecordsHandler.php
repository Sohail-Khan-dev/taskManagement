<?php

namespace App\Livewire;

use App\Models\eziTask;
use http\Env\Request;
use Livewire\WithPagination;
use Livewire\Attributes\Rule ;
use Livewire\Component;

class RecordsHandler extends Component
{
    use WithPagination;
#region for Properties to store recoreds in database
    #[Rule('required|min:3')]
    public $title;
    #[Rule('required|min:3')]
    public $description;
    #[Rule('required|min:3')]
    public $status;
#endregion
    // This is for the Editing the tasks.
    public $taskId;
    // isOpen is a variable which handle the modal opening and closing.
    public $isOpen = false;

    public function create(){
        $this->openModal();
    }
    public function openModal(){
        $this->isOpen = true;
        // This will reset the error text written below the textfields if any.
        $this->resetValidation();
    }
    public function closeModal(){
        $this->isOpen = false;
    }

    public function addTask(){
        // dd($this->title . " , " . $this->description. " , " . $this->status );
        $this->validate();
        eziTask::create([
            'title' => $this->title,
            'description' => $this->description,
            'status'=>$this->status
        ]);
        session()->flash('success', 'Task created successfully.');

        $this->resetExcept('isOpen','tasks');
        // we can also use $this->reset() to reset all the public properties
        $this->closeModal();
    }

    public function deleteTask($id){
        eziTask::find($id)->delete();
      session()->flash('success', 'Task deleted successfully.');
      $this->reset();
    }

    public function editTask($id){
        // dd('edit is called');
        $task = eziTask::findOrFail($id);
        $this->taskId = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->openModal();
    }
    public function updateTask()
    {
        if ($this->taskId) {
            $task = eziTask::findOrFail($this->taskId);
            $task->update([
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status
            ]);
            session()->flash('success', 'Task updated successfully.');
            $this->closeModal();

            $this->reset();
        }
    }
    public function render()
    {
        return view('livewire.records-handler' , [
          'tasks' =>  eziTask::paginate(5),
        ]);
    }

}
