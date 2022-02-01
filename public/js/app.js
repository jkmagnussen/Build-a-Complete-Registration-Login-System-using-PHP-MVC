/**
 * Add jQuery Validation Plugin method for a valid password
 * 
 * valid passwords contain at least one letter and one number.
 */

$.validator.addMethod('validPassword',
        function(value, element, param){
            if (value != ''){
                if (value.match(/.*[a-z]+.*/i) == null){
                    return false;
                }
                if (value.match(/.*\d+.*/) == null){
                    return false;
                }
            }
            return true;
        },
        'Must contain at least one letter and one number'
    );
