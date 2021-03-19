$(document).ready(function() {
    $('#basic-form').validate({
        rules: {
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
          },
        },
        messages: {
          email: {
            required: 'Please enter Email Address.',
            email: 'Please enter a valid Email Address.',
          },
          password: {
            required: 'Please enter Password.',
          }
        },
        submitHandler: function (form) {
          form.submit();
        }
      });

      
  });