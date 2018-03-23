## Database

### Product

*ID* integer
*Name* string
*Availability* boolean
*SKU* string
*UPC* string
*Description* text
*Features* longtext
*Specifications* longtext
*Product Type* tag
*Brand* tag
*Categories* tags
    if tagged as featured then 
        *Price* string/float

###### Vairations

*ID* integer
*Product Id* integer
*Option Id* integer
