<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class BookingRequest extends FormRequest 
{

  /**
   * Get the validation rules that apply to the request.
   *
   * @return arra
   */
  public function rules() 
  {

   $validation = [
         'customer_id' => 'exists:customers,id|required|integer',
         'cleaner_id' => 'exists:cleaners,id|required|integer',
         'date' => 'required|date|after:tomorrow'
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