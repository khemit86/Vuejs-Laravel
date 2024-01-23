import { required, confirmed, length, email,max,min } from "vee-validate/dist/rules";
import { extend } from "vee-validate";
extend("required", {
    ...required,
    message: "This field is required."
  });
  
  extend("email", {
    ...email,
    message: "This field must be a valid email"
  });
  
  extend("confirmed", {
    ...confirmed,
    message: "This field confirmation does not match"
  });
  
  extend("postalcode", {
    ...length,
    message: "4 digits postal code is required."
  });

  extend("mobile", {
    ...length,
    message: "8 digits phone number is required."
  });

  

  

  