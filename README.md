#Info


##Adding your own shipment
By default only 2 shipment types aviable, they are:
- Nova poshta
- Self delivery

        mtt_shipping.shipment_method.self:
            class: Mtt\ShippingBundle\Model\SelfDelivery\SDShipmentMethod
            lazy: true
        
        
       mtt_shipping.shipping_service:
            class: Mtt\ShippingBundle\Service\ShippingService
            arguments: ['@mtt_shipping.shipping_repository_service']
            calls:
                - method: addShipmentMethod
                  arguments: [ 'mtt_shipping.shipment_method.nova-poshta', '@mtt_shipping.shipment_method.nova-poshta']
                - method: addShipmentMethod
                  arguments: ['mtt_shipping.shipment_method.self', '@mtt_shipping.shipment_method.self']
            lazy: true
            
You can see them in bundle services.yml configuration. 
To add you own bundle you have to rewrite this config and add your own    
example:
               
        your_shipping_method:
            class: YourBundle/Model/SomeMethod
            lazy: true     
            
        mtt_shipping.shipping_service:
             class: Mtt\ShippingBundle\Service\ShippingService
             arguments: ['@mtt_shipping.shipping_repository_service']
             calls:
                    - method: addShipmentMethod
                     arguments: [ 'your_shipping_method', '@your_shipping_method']
  
To make it visible in frontend - insert row to database table (shipment_method_service_name column must be the same as your service name 'your_shipping_method')                     
                            