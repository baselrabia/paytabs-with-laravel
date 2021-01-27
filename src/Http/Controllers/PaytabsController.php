<?php

namespace App\Http\Controllers;

use App\Models\PaytabsInvoice;
use Basel\Paytabs\Paytabs;
use Illuminate\Http\Request;

class PaytabsController extends Controller
{

    public function index()
    {

        // $pt = app('paytabs'); //the instance through the register service provider singleton

        $result = Paytabs::getInstance()->create_pay_page(array(

            //Customer's Personal Information
            'cc_first_name' => "john",          //This will be prefilled as Credit Card First Name
            'cc_last_name' => "Doe",            //This will be prefilled as Credit Card Last Name
            'cc_phone_number' => "00973",
            'phone_number' => "33333333",
            'email' => "customer@gmail.com",

            //Customer's Billing Address (All fields are mandatory)
            //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected.
            //For other countries, the state can be a string of up to 32 characters.
            'billing_address' => "manama bahrain",
            'city' => "manama",
            'state' => "manama",
            'postal_code' => "00973",
            'country' => "BHR",

            //Customer's Shipping Address (All fields are mandatory)
            'address_shipping' => "Juffair bahrain",
            'city_shipping' => "manama",
            'state_shipping' => "manama",
            'postal_code_shipping' => "00973",
            'country_shipping' => "BHR",

            //Product Information
            "products_per_title" => "Product1 || Product 2 || Product 4",   //Product title of the product. If multiple products then add “||” separator
            'quantity' => "1 || 1 || 1",                                    //Quantity of products. If multiple products then add “||” separator
            'unit_price' => "2 || 2 || 6",                                  //Unit price of the product. If multiple products then add “||” separator.
            "other_charges" => "91.00",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
            'amount' => "101.00",                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
            'discount' => "1",                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount

            //Invoice Information
            'title' => "John Doe",               // Customer's Name on the invoice
            "reference_no" => "1231231",        //Invoice reference number in your system

        ));


        // dd($result);

        if ($result->response_code == 4012) {
            return redirect($result->payment_url);
        }
        if ($result->response_code == 4094) {
            return $result->details;
        }

        return $result->result;
    }

    public function response(Request $request)
    {

        $result = Paytabs::getInstance()->verify_payment($request->payment_reference);

        if ($result->response_code == 100) {
            //success
            $this->createInvoice((array)$result);
        }
        return $result->result;
    }

    public function createInvoice($request)
    {
        $request['order_id'] = $request["reference_no"];
        PaytabsInvoice::create($request);
    }
}
