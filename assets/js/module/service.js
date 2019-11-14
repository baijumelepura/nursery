app.service('Logs', function() {
    this.warning = function (message , location=null, size =null) {
        $.growl.warning({
            title: "<i class='fa fa-exclamation-triangle'></i>  warning .. !",
            message: message,
            size: size ? size :  "large",
            location:location ? location: "tr"
        });
    }
    this.success = function (message , location=null, size =null) {
        $.growl.notice({
            title: "<i class='fa fa-check'></i>  Success .. !",
            message: message,
            size: size ? size :  "large",
            location:location ? location: "tr"
        });
    }
    this.error = function (message , location=null, size =null) {
        $.growl.error({
            title: "<i class='fa fa-exclamation-circle' ></i> Error .. !",
            message: message,
            size: size ? size :  "large",
            location:location ? location: "tr",
           // duration:50000,
        });
    }
    
});