<?php

namespace App\Http\Livewire\Admin;

use App\Models\PropertyType;
use Illuminate\Http\Request;
use Livewire\Component;

class PropertyTypeComponent extends Component
{
    public function deleteType($id)
    {
        // $type = PropertyType::find($id);
        // $type->delete();

        // session()->flash('success','Property Type deleted successfully!');
        // return redirect()->route('admin.property.type');
        $delete = PropertyType::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

        return redirect()->route('admin.property.type');
    }
    public function render()
    {
        $types = PropertyType::all();
        return view('livewire.admin.property-type-component',
        [
            'types' => $types
        ])->layout('layouts.admin');
    }
}
