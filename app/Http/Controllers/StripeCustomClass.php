<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe_Error;
use Illuminate\Support\Str;
class StripeCustomClass extends Controller
{
    public function __construct(){
		$account = Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }

    public function createCustomer($email,$description = ''){
    	try {		
				$description = !empty($description) ? 'Customer for Project': $description;
				$customer = \Stripe\Customer::create(array(
					  "description" => $description,
					  "email" => $email,
				));
				$data['status'] = 1;
				$data['stripe_customer_id'] = $customer->id;
			} catch(\Stripe\Error\Card $e) {
				$body = $e->getJsonBody();
				$err  = $body['error'];
				$data['status'] = 2;
				$data['error'] = $err['message'];
			} catch (\Stripe\Error\RateLimit $e) {
			 	$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\InvalidRequest $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Authentication $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\ApiConnection $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Base $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (Exception $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			}
		return $data;
    }


    public function createCardToken($card_number, $ex_month, $ex_year, $cvv)
    {
    	try {
			$card_token = \Stripe\Token::create([
                  "card" => [
                    "number" => $card_number,
                    "exp_month" => $ex_month,
                    "exp_year" => $ex_year,
                    "cvc" => $cvv
                  ]
                ]);

			$data['status'] = 1;
			$data['token'] = $card_token;

		} catch(\Stripe\Error\Card $e) {
			$body = $e->getJsonBody();
			$err  = $body['error'];
			$data['status'] = 2;
			$data['error'] = $err['message'];
		} catch (\Stripe\Error\RateLimit $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\InvalidRequest $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\Authentication $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\ApiConnection $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\Base $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (Exception $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		}
		return $data;
    }



    public function addCreditCard($stripe_customer_id,$token_id){
    	try {
			$customer = \Stripe\Customer::retrieve($stripe_customer_id);
			$customer->createSource($stripe_customer_id, array("source" => $token_id));
			//return $customer->sources->create(array("source" => $token_id));
			$customer->save();

			$data['status'] = 1;
			$data['card_id'] = $customer->default_source;
		} catch(\Stripe\Error\Card $e) {
			$body = $e->getJsonBody();
			$err  = $body['error'];
			$data['status'] = 2;
			$data['error'] = $err['message'];
		} catch (\Stripe\Error\RateLimit $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\InvalidRequest $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\Authentication $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\ApiConnection $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\Base $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (Exception $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		}
		return $data;
    }

    public function deleteCreditCard($stripe_customer_id,$card_id){
    	try {
			$customer = \Stripe\Customer::retrieve($stripe_customer_id);
			$customer->sources->retrieve($card_id)->delete();
			$customer->save();
			$data['status'] = 1;
		} catch(\Stripe\Error\Card $e) {
			$body = $e->getJsonBody();
			$err  = $body['error'];
			$data['status'] = 2;
			$data['error'] = $err['message'];
		} catch (\Stripe\Error\RateLimit $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\InvalidRequest $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\Authentication $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\ApiConnection $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (\Stripe\Error\Base $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		} catch (Exception $e) {
			$data['status'] = 2;
			$data['error'] = $e->getMessage();
		}
		return $data;
    }

    public function refundCardPayment($transaction_id){
    //dd($transaction_id);

    	// print($transaction_id); 
   	try {
		   	$refund = \Stripe\Refund::create([
		    'charge' => $transaction_id,
		    'reason' => 'requested_by_customer'
		    ]);
			$data['status'] = 1;
		    $data['id'] = $refund->id;

       }catch(\Stripe\Error\Card $e) {
				$body = $e->getJsonBody();
				$err  = $body['error'];
				$data['status'] = 2;
				$data['error'] = $err['message'];
			} catch (\Stripe\Error\RateLimit $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\InvalidRequest $e) {
				$data['status'] = 2;
			    $data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Authentication $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\ApiConnection $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Base $e) {
				$data['status'] = 2;  
				$data['error'] = $e->getMessage();
			} catch (Exception $e) { 
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			}
		return $data;   
   }

   public function createCreditCardPayment($stripe_customer_id, $token_id, $amount, $description){
    	//dd($amount); die;

   		if($amount >= 0.3){

   			try {	
			
				$charge = \Stripe\Charge::create(array(
				  "amount" => $amount * 100,
				  "currency" => 'USD',  //currency
				  'source' => $token_id,
				  'description' => $description,
				));
				$data['status'] = 1;
				$data['transacation_id'] = $charge->id;
			} catch(\Stripe\Error\Card $e) {
				$body = $e->getJsonBody();
				$err  = $body['error'];
				$data['status'] = 2;
				$data['error'] = $err['message'];
			} catch (\Stripe\Error\RateLimit $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\InvalidRequest $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Authentication $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\ApiConnection $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Base $e) {
				$data['status'] = 2;  
				$data['error'] = $e->getMessage();
			} catch (Exception $e) {  
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			}

   		}else{

   			$data['status'] = 1;
			$data['transacation_id'] = 'xxxx' . str_random(12);

   		}

    	
		return $data;
    }

    public function transferAmountToMerchant($stripe_customer_id,$amount_99_persent,$stripe_merchant_id,$orderId,$card_id = ''){
    	try {	

				$transfer = \Stripe\Transfer::create(array(
					  "amount" => $amount_99_persent * 100, // cent,
					  "currency" => "usd",
					  "destination" => $stripe_merchant_id,
					  "transfer_group" => "{$orderId}"
					));
				$data['status'] = 1;
				$data['transacation_id'] = $transfer->id;
			} catch(\Stripe\Error\Card $e) {
				$body = $e->getJsonBody();
				$err  = $body['error'];
				$data['status'] = 2;
				$data['error'] = $err['message'];
			} catch (\Stripe\Error\RateLimit $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\InvalidRequest $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Authentication $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\ApiConnection $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (\Stripe\Error\Base $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			} catch (Exception $e) {
				$data['status'] = 2;
				$data['error'] = $e->getMessage();
			}
		return $data;
    }	














 



  //   public function createBankToken()
  //   {
  //   	try {
		// 	$bank_token = \Stripe\Token::create([
  //                 'bank_account' => [
		// 		    'country' => 'US',
		// 		    'currency' => 'usd',
		// 		    'account_holder_name' => 'Andrew',
		// 		    'account_holder_type' => 'individual',
		// 		    'routing_number' => '110000000',
		// 		    'account_number' => '000123456789',
		// 		  ],
  //               ]);

		// 	$data['status'] = 1;
		// 	$data['data'] = $bank_token;

		// } catch(\Stripe\Error\Card $e) {
		// 	$body = $e->getJsonBody();
		// 	$err  = $body['error'];
		// 	$data['status'] = 2;
		// 	$data['error'] = $err['message'];
		// } catch (\Stripe\Error\RateLimit $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\InvalidRequest $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\Authentication $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\ApiConnection $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\Base $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (Exception $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// }
		// return $data;
  //   }






 





  //   public function payout($amount_99_persent, $destination )
  //   {
  //   	try {	
			
		// 	$payout = \Stripe\Payout::create(array(
		// 	  "amount" => $amount_99_persent,
		// 	  "currency" => "usd",  //currency
		// 	  "destination" => $destination,
		// 	  "method" => "standard",
		// 	  "source_type" => "bank_account"
		// 	));
		// 	$data['status'] = 1;
		// 	$data['data'] = $payout;
		// } 
		// catch(\Stripe\Error\Card $e) {
		// 	$body = $e->getJsonBody();
		// 	$err  = $body['error'];
		// 	$data['status'] = 2;
		// 	$data['error'] = $err['message'];
		// } catch (\Stripe\Error\RateLimit $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\InvalidRequest $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\Authentication $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\ApiConnection $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (\Stripe\Error\Base $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// } catch (Exception $e) {
		// 	$data['status'] = 2;
		// 	$data['error'] = $e->getMessage();
		// }
		// return $data;
  //   }




}
