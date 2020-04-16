/*!
 * JIC JavaScript Library v2.0.2
 * https://github.com/brunobar79/J-I-C/
 *
 * Copyright 2016, Bruno Barbieri
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Date: Tue Jul 11 13:13:03 2016 -0400
 */



/**
 * Create the jic object.
 * @constructor
 */

var jic = {
        /**
         * Receives an Image Object (can be JPG, PNG, or WEBP) and returns a new Image Object compressed
         * @param {Image} source_img_obj The source Image Object
         * @param {Integer} quality The output quality of Image Object
         * @param {String} output format. Possible values are jpg, png, and webp
         * @return {Image} result_image_obj The compressed Image Object
         */

        compress: function(source_img_obj, quality, output_format){
             
             var mime_type;
             if(output_format==="png"){
                mime_type = "image/png";
             } else if(output_format==="webp") {
                mime_type = "image/webp";
             } else {
                mime_type = "image/jpeg";
             }

             var cvs = document.createElement('canvas');
             cvs.width = 1080;
             cvs.height = 820;
             var ctx = cvs.getContext("2d").drawImage(source_img_obj, 0, 0, 1080, 820);
             var newImageData = cvs.toDataURL(mime_type, quality/100);
             var result_image_obj = new Image();
             result_image_obj.src = newImageData;
             return result_image_obj;
        }
};