<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CustomerRequest extends FormRequest 
{

  /**
   * Get the validation rules that apply to the request.
   *
   * @return arra
   */
  public function rules() 
  {

   $validation = [
         'first_name' => 'required|max:255',
         'last_name' => 'required|max:255',
         'phone_number' => 'max:255'
    ];
   
   
    return $validation;
  }


  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() 
  {
    return true;
  }

}
