/* ------------------------------------------------------------------------------
 *
 *  # Form validation
 *
 *  Specific JS code additions for form_validation.html page
 *
 *  Version: 1.2
 *  Latest update: Dec 15, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function () {


    // Form components
    // ------------------------------

    // Switchery toggles
    var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
    elems.forEach(function (html) {
        var switchery = new Switchery(html);
    });


    // Bootstrap switch
    $(".switch").bootstrapSwitch();


    // Bootstrap multiselect
    $('.multiselect').multiselect({
        checkboxName: 'vali'
    });


    // Touchspin
    $(".touchspin-postfix").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        postfix: '%'
    });


    // Select2 select
    $('.select').select2({
        minimumResultsForSearch: Infinity
    });


    // Styled checkboxes, radios
    $(".styled, .multiselect-container input").uniform({radioClass: 'choice'});


    // Styled file input
    $(".file-styled").uniform({
        wrapperClass: 'bg-teal-400',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });


    // Setup validation
    // ------------------------------

    //$.validator.addMethod("validateUserEmail", function (value, element) {
    //    var _token=$('.form-validate-jquery :input[name="_token"]').val();
    //    var name = $('.form-validate-jquery :input[name="name"]').val();
    //        //name=inputElem.val();
    //        //eReport = ''; //error report
    //    $.ajax(
    //        {
    //            type: "POST",
    //            url: 'groupproduct/add',
    //            //dataType: "json",
    //            data: {"name":name,"_token":_token},
    //            success: function (data) {
    //                if (data == 'false') {
    //                    return 'This email address is already registered.';
    //                }
    //                else {
    //                    return true;
    //                }
    //            }
    //            //error: function (xhr, textStatus, errorThrown) {
    //            //    alert('ajax loading error... ... ' + url + query);
    //            //    return false;
    //            //}
    //        });
    //
    //}, '');
    //$(':input[name="name"]').rules("add", { "validateUserEmail" : true} );
    // Initialize
    //$.validator.addMethod("unique",
    //    function (value, element,params) {
    //        var result = false;
    //        var _token=$('input[name=_token]').val();
    //        //if(value == '')
    //        //    return result;
    //
    //        //id_send= '';
    //        //if(params[1] !='')
    //        //    id_send ='id='+params[1]+'&';
    //        $.ajax({
    //            type: "post",
    //            //async: false,
    //            async: false,
    //            url: "groupproduct/checkName", // script to validate in server side
    //            data: {name: value,_token:_token},
    //            success: function (data) {
    //                //result = data == true;
    //                result = (data == true) ? true : false;
    //                //alert(result)
    //                //result=data;
    //            }
    //        });
    //        // return true if username is exist in database
    //        return result;
    //        //alert(result);
    //    },
    //    'Dữ liệu đã tồn tại.Vui lòng chọn lại!'
    //);
    $(".form-validate-jquery").validate({

        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function (error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container')) {
                if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo(element.parent().parent().parent().parent());
                }
                else {
                    error.appendTo(element.parent().parent().parent().parent().parent());
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo(element.parent().parent().parent());
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo(element.parent());
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo(element.parent().parent());
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo(element.parent().parent());
            }

            else {
                error.insertAfter(element);
            }
        },

        validClass: "validation-valid-label",
        success: function (label) {
            label.addClass("validation-valid-label").text("Hợp lệ.")
        },
        rules: {

            "name[]": {
                //required:true,,
                minlength: 4
                //validateUserEmail: true
                //unique:true
                //checkUnique: true
                //"remote":{
                //    url: 'groupproduct/add',
                //    type: "post",
                //    data:
                //    {
                //
                //        name: function()
                //        {
                //
                //            return $('.form-validate-jquery :input[name="name"]').val();
                //        }
                //    }
                //}
            },
            //"image[]":{
            //    extension: "xls|csv"
            //},
            password: {
                minlength: 5
            },
            repeat_password: {
                equalTo: "#password"
            },
            email: {
                email: true
            },
            repeat_email: {
                equalTo: "#email"
            },
            minimum_characters: {
                minlength: 10
            },
            maximum_characters: {
                maxlength: 10
            },
            minimum_number: {
                min: 10
            },
            maximum_number: {
                max: 10
            },
            number_range: {
                range: [10, 20]
            },
            url: {
                url: true
            },
            date: {
                date: true
            },
            date_iso: {
                dateISO: true
            },
            numbers: {
                number: true
            },
            digits: {
                digits: true
            },
            card: {
                creditcard: true
            },
            basic_checkbox: {
                minlength: 2
            },
            styled_checkbox: {
                minlength: 2
            },
            switchery_group: {
                minlength: 2
            },
            switch_group: {
                minlength: 2
            }
        },
        messages: {
            "describe[]": {
                required: "Vui lòng nhập nội dung mô tả!"

            },
            "name[]": {
                required: "Vui lòng nhập tên!",
                minlength:"Vui lòng nhập tên lớn hơn 4 ký tự!"
            },
            agree: "Please accept our policy"
        }
    });


    // Reset form
    $('#reset').on('click', function () {
        validator.resetForm();
    });

});
