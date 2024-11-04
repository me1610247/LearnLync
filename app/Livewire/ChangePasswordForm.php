<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChangePasswordForm extends Component
{
    public $old_password;
    public $new_password;
    public $confirm_password;

    // Method to update the password
    public function updatePassword()
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'confirm_password' => 'required',
        ]);

        // Update password logic here (e.g., hashing and saving the new password)
        session()->flash('success', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.change-password-form'); // Ensure this view exists
    }
}
