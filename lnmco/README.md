# mpesa-library
Mpesa Api library 

# usage
Initialize mpesa library

     $mpesa  = new Mpesa();
    //get result returned by functions
    echo  $mpesa->get_message();
     
 # access_token
  To get access token
  
     echo " Token : " .$mpesa->oauth_token();  
     Token : zlfUeamewm24r2NjnsgjBlQQANNP
    
 # STKPushQuery
 
     
     print_r($mpesa->STKPushQuery('ws_CO_DMZ_297481201_09042019174418021'));        
      //Success Result 
     { "ResponseCode": "0", 
       "ResponseDescription":"The service request has been accepted successsfully", 
      "MerchantRequestID":"28415-165347-1",
      "CheckoutRequestID":"ws_CO_DMZ_297481201_09042019174418021",
      "ResultCode": "1032", 
      "ResultDesc":"[STK_CB - ]Request cancelled by user" 
      }
      
  # STKPushSimulation
   This feature allows the transaction initiation to be moved from the paying customer's side to the payee Organization's side. This   eliminates the challenge of having to remember business paybill numbers and account numbers and allows customers to simply confirm the transaction by entering their MPesa PIN on their mobile phone. This is done via the STK push/Pop-up which appears on a customer's phone that prompts them to enter their PIN. 
   
      print_r($mpesa->STKPushSimulation('20','254708374149','pay now','test'));
    //Success Result 
      { 
       "MerchantRequestID":"16658-1455367-1", 
       "CheckoutRequestID":"ws_CO_DMZ_435322918_09042019180550656", 
       "ResponseCode": "0",        
       "ResponseDescription":"Success. Request accepted for processing", 
       "CustomerMessage":"Success. Request accepted for processing"
      }
     
  # register url
  The Register URL API under C2B APIs. It is the first half of the C2B API for receiving payment notifications to your paybill. This API enables you to register the callback URLs via which you shall receive payment notifications for payments to your paybill/till number. The URLs are used by the C2B payment simulation API for sending the transaction details to you.
  
     print_r( $mpesa->register_url());   
     //Success Result 
     {
      "ConversationID": "", 
      "OriginatorCoversationID": "", 
      "ResponseDescription": "success"
     }
     
  # c2b
  This API is used for payment requests from clients to your API. You can use the sandbox to simulates a payment made from the client phone's STK/SIM Toolkit menu, and enables you to receive the payment requests in real time. It uses URL as described in the Register URL API and requires the URLs registered to work. For better understanding of this API, consider going through the Register URL section above to better understand the process flow of a C2B transaction and the requirements of URL
  
     print_r($mpesa->c2b('120','254708374149','account'));
     //Success Result 
       { 
         "ConversationID": "AG_20190409_000079ec780236c1f54f", 
         "OriginatorCoversationID": "6896-31171-1",
         "ResponseDescription": "Accept the service request successfully."
       }
     
   # b2c
   B2C simply means Business to Customer. This is a transaction that comes from a Business (Bank) to Customer (Client). This API enables a Businesses or Organization to pay their customers. The most common reasons a business can pay their customer include salary payments, promotion payments or normal business payments (e.g. transfers from bank to mobile). Each of these scenarios has their own unique characteristics, but all lie under the B2C (Business to Customer) API category.
   
     print_r($mpesa->b2c('20','BusinessPayment','254708374149','payment'));
    //Success Result 
     { 
       "ConversationID": "AG_20190409_0000515207592fa5723a", 
       "OriginatorConversationID": "28412-215980-1", 
       "ResponseCode":"0",
       "ResponseDescription": "Accept the service request successfully." 
     }
   
   # b2b
   This API enables a Business or Organization to perform transactions between each other. The transaction flow is the same as the B2C API transaction flow, but this time the Credit Party is another Business/Company/Organization. It requires the same credentials and information as the B2C API.

Currently the B2B API allows an organization to perform 5 types of transfers:
Business Pay Bill: This is a transfer of funds from one Organization's Working Account to another Organization's Utility Account.
Business Buy Goods: A transfer of funds from one Organization's Working Account to another Organization's Merchant Account.
Disburse Funds To Business: A transfer of funds from one Organization's Utility Account to another Organization's Working Account.
Business To Business Transfer: A transfer of funds from one Organization's Working Account to another Organization's Working Account.
Merchant To Merchant Transfer: A transfer of funds from one Organization's Merchant Account to another Organization's Merchant Account.

    print_r($mpesa->b2b('10000','BusinessPayBill','60000','4','4','paytest','cool'));
    //Success Result 
     { 
       "ConversationID": "AG_20190409_0000515207592fa5723a", 
       "OriginatorConversationID": "28412-215980-1", 
       "ResponseCode":"0",
       "ResponseDescription": "Accept the service request successfully." 
     }
     
   # reversal
   This API enables reversal of transactions done
   
     print_r( $mpesa->reversal('2','254708374149','1','NCR7S1UXBT','PAY NOW VIA WASKSOFT'));
     
  # accountbalance
     print_r($mpesa->accountbalance('600443','4','remarks'));
     
  # transaction status
     print_r($mpesa->transaction_status('NCR7S1UXBT','254708374149','4','apitest'));
  
 
  
