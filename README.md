# query-string-content-shortcode

Provides a shortcode to retrieve any query string from the url and display it or display content if specified value is set.

HOW TO USE THIS SHORTCODE PLUGIN

Specify a field and value to return content or specify just a field to return a value. Alternatively, find a value or field from the query string and return the content.

EXAMPLE 1 

URL: example.com/home/?city=Perth 

SHORTCODE: [query_string_content field="city" value="Perth"]The text will display[/query_string_content] 

RESULT: The text will display

EXAMPLE 2 

URL: example.com/home/?city=Perth 

SHORTCODE: [query_string_content field="city"][/query_string_content] 

RESULT: Perth

EXAMPLE 3 

URL: example.com/home/?city=Perth 

SHORTCODE: [query_string_content find="Perth"]Yes, the string was found[/query_string_content] 

RESULT: Yes, the string was found
