<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class email extends CI_Model {


	public function email_model($body)
	{
        $template='
        <style>
        #outlook a {
            padding: 0;
          }
          .ExternalClass {
            width: 100%;
          }
          .ExternalClass,
          .ExternalClass p,
          .ExternalClass span,
          .ExternalClass font,
          .ExternalClass td,
          .ExternalClass div {
            line-height: 100%;
          }
          .es-button {
            mso-style-priority: 100 !important;
            text-decoration: none !important;
          }
          a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
          }
          .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
            mso-hide: all;
          }
          s {
            text-decoration: line-through;
          }
          html,
          body {
            width: 100%;
            font-family: arial, "helvetica neue", helvetica, sans-serif;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
          }
          table {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            border-collapse: collapse;
            border-spacing: 0px;
          }
          table td,
          html,
          body,
          .es-wrapper {
            padding: 0;
            margin: 0;
          }
          
          .es-content,
          .es-header,
          .es-footer {
            table-layout: fixed !important;
            width: 100%;
          }
          
          img {
            display: block;
            border: 0;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
          }
          
          table tr {
            border-collapse: collapse;
          }
          
          p,
          hr {
            margin: 0;
          }
          
          h1,
          h2,
          h3,
          h4,
          h5 {
            margin: 0;
            line-height: 120%;
            mso-line-height-rule: exactly;
            font-family: arial, "helvetica neue", helvetica, sans-serif;
          }
          
          p,
          ul li,
          ol li,
          a {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            mso-line-height-rule: exactly;
          }
          
          .es-left {
            float: left;
          }
          
          .es-right {
            float: right;
          }
          
          .es-p5 {
            padding: 5px;
          }
          
          .es-p5t {
            padding-top: 5px;
          }
          
          .es-p5b {
            padding-bottom: 5px;
          }
          
          .es-p5l {
            padding-left: 5px;
          }
          
          .es-p5r {
            padding-right: 5px;
          }
          
          .es-p10 {
            padding: 10px;
          }
          
          .es-p10t {
            padding-top: 10px;
          }
          
          .es-p10b {
            padding-bottom: 10px;
          }
          
          .es-p10l {
            padding-left: 10px;
          }
          
          .es-p10r {
            padding-right: 10px;
          }
          
          .es-p15 {
            padding: 15px;
          }
          
          .es-p15t {
            padding-top: 15px;
          }
          
          .es-p15b {
            padding-bottom: 15px;
          }
          
          .es-p15l {
            padding-left: 15px;
          }
          
          .es-p15r {
            padding-right: 15px;
          }
          
          .es-p20 {
            padding: 20px;
          }
          
          .es-p20t {
            padding-top: 20px;
          }
          
          .es-p20b {
            padding-bottom: 20px;
          }
          
          .es-p20l {
            padding-left: 20px;
          }
          
          .es-p20r {
            padding-right: 20px;
          }
          
          .es-p25 {
            padding: 25px;
          }
          
          .es-p25t {
            padding-top: 25px;
          }
          
          .es-p25b {
            padding-bottom: 25px;
          }
          
          .es-p25l {
            padding-left: 25px;
          }
          
          .es-p25r {
            padding-right: 25px;
          }
          
          .es-p30 {
            padding: 30px;
          }
          
          .es-p30t {
            padding-top: 30px;
          }
          
          .es-p30b {
            padding-bottom: 30px;
          }
          
          .es-p30l {
            padding-left: 30px;
          }
          
          .es-p30r {
            padding-right: 30px;
          }
          
          .es-p35 {
            padding: 35px;
          }
          
          .es-p35t {
            padding-top: 35px;
          }
          
          .es-p35b {
            padding-bottom: 35px;
          }
          
          .es-p35l {
            padding-left: 35px;
          }
          
          .es-p35r {
            padding-right: 35px;
          }
          
          .es-p40 {
            padding: 40px;
          }
          
          .es-p40t {
            padding-top: 40px;
          }
          
          .es-p40b {
            padding-bottom: 40px;
          }
          
          .es-p40l {
            padding-left: 40px;
          }
          
          .es-p40r {
            padding-right: 40px;
          }
          
          .es-menu td {
            border: 0;
          }
          
          .es-menu td a img {
            display: inline-block !important;
          }
          
          /*
          END CONFIG STYLES
          */
          a {
            font-family: arial, "helvetica neue", helvetica, sans-serif;
            font-size: 14px;
            text-decoration: underline;
          }
          
          h1 {
            font-size: 30px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
          }
          
          h1 a {
            font-size: 30px;
          }
          
          h2 {
            font-size: 24px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
          }
          
          h2 a {
            font-size: 24px;
          }
          
          h3 {
            font-size: 20px;
            font-style: normal;
            font-weight: normal;
            color: #333333;
          }
          
          h3 a {
            font-size: 20px;
          }
          
          p,
          ul li,
          ol li {
            font-size: 14px;
            font-family: arial, "helvetica neue", helvetica, sans-serif;
            line-height: 150%;
          }
          
          ul li,
          ol li {
            margin-bottom: 15px;
          }
          
          .es-menu td a {
            text-decoration: none;
            display: block;
          }
          
          .es-wrapper {
            width: 100%;
            height: 100%;
            background-image: ;
            background-repeat: repeat;
            background-position: center top;
          }
          
          .es-wrapper-color {
            background-color: #f7f7f7;
          }
          
          .es-content-body {
            background-color: #ffffff;
          }
          
          .es-content-body p,
          .es-content-body ul li,
          .es-content-body ol li {
            color: #333333;
          }
          
          .es-content-body a {
            color: #3d5ca3;
          }
          
          .es-header {
            background-color: transparent;
            background-image: ;
            background-repeat: repeat;
            background-position: center top;
          }
          
          .es-header-body {
            background-color: transparent;
          }
          
          .es-header-body p,
          .es-header-body ul li,
          .es-header-body ol li {
            color: #333333;
            font-size: 14px;
          }
          
          .es-header-body a {
            color: #3d5ca3;
            font-size: 14px;
          }
          
          .es-footer {
            background-color: transparent;
            background-image: ;
            background-repeat: repeat;
            background-position: center top;
          }
          
          .es-footer-body {
            background-color: transparent;
          }
          
          .es-footer-body p,
          .es-footer-body ul li,
          .es-footer-body ol li {
            color: #666666;
            font-size: 12px;
          }
          
          .es-footer-body a {
            color: #666666;
            font-size: 12px;
          }
          
          .es-infoblock,
          .es-infoblock p,
          .es-infoblock ul li,
          .es-infoblock ol li {
            line-height: 120%;
            font-size: 11px;
            color: #999999;
          }
          
          .es-infoblock a {
            font-size: 11px;
            color: #3d5ca3;
          }
          
          a.es-button {
            border-style: solid;
            border-color: #ffffff;
            border-width: 10px 15px 10px 15px;
            display: inline-block;
            background: #ffffff;
            border-radius: 4px;
            font-size: 16px;
            font-family: arial, "helvetica neue", helvetica, sans-serif;
            font-weight: normal;
            font-style: normal;
            line-height: 120%;
            color: #3d5ca3;
            text-decoration: none;
            width: auto;
            text-align: center;
          }
          
          .es-button-border {
            border-style: solid solid solid solid;
            border-color: #3d5ca3 #3d5ca3 #3d5ca3 #3d5ca3;
            background: #ffffff;
            border-width: 2px 2px 2px 2px;
            display: inline-block;
            border-radius: 4px;
            width: auto;
          }
          
          @media only screen and (max-width: 600px) {
            p,
            ul li,
            ol li,
            a {
              font-size: 14px !important;
              line-height: 150% !important;
            }
          
            h1 {
              font-size: 30px !important;
              text-align: left;
              line-height: 120% !important;
            }
          
            h2 {
              font-size: 26px !important;
              text-align: left;
              line-height: 120% !important;
            }
          
            h3 {
              font-size: 20px !important;
              text-align: left;
              line-height: 120% !important;
            }
          
            h1 a {
              font-size: 30px !important;
              text-align: left;
            }
          
            h2 a {
              font-size: 26px !important;
              text-align: left;
            }
          
            h3 a {
              font-size: 20px !important;
              text-align: left;
            }
          
            .es-menu td a {
              font-size: 14px !important;
            }
          
            .es-header-body p,
            .es-header-body ul li,
            .es-header-body ol li,
            .es-header-body a {
              font-size: 14px !important;
            }
          
            .es-footer-body p,
            .es-footer-body ul li,
            .es-footer-body ol li,
            .es-footer-body a {
              font-size: 12px !important;
            }
          
            .es-infoblock p,
            .es-infoblock ul li,
            .es-infoblock ol li,
            .es-infoblock a {
              font-size: 11px !important;
            }
          
            *[class="gmail-fix"] {
              display: none !important;
            }
          
            .es-m-txt-c,
            .es-m-txt-c h1,
            .es-m-txt-c h2,
            .es-m-txt-c h3 {
              text-align: center !important;
            }
          
            .es-m-txt-r,
            .es-m-txt-r h1,
            .es-m-txt-r h2,
            .es-m-txt-r h3 {
              text-align: right !important;
            }
          
            .es-m-txt-l,
            .es-m-txt-l h1,
            .es-m-txt-l h2,
            .es-m-txt-l h3 {
              text-align: left !important;
            }
          
            .es-m-txt-r img,
            .es-m-txt-c img,
            .es-m-txt-l img {
              display: inline !important;
            }
          
            .es-button-border {
              display: inline-block !important;
            }
          
            a.es-button {
              font-size: 18px !important;
              display: inline-block !important;
            }
          
            .es-btn-fw {
              border-width: 10px 0px !important;
              text-align: center !important;
            }
          
            .es-adaptive table,
            .es-btn-fw,
            .es-btn-fw-brdr,
            .es-left,
            .es-right {
              width: 100% !important;
            }
            .es-content table,
            .es-header table,
            .es-footer table,
            .es-content,
            .es-footer,
            .es-header {
              width: 100% !important;
              max-width: 600px !important;
            }
            .es-adapt-td {
              display: block !important;
              width: 100% !important;
            }
            .adapt-img {
              width: 100% !important;
              height: auto !important;
            }
            .es-m-p0 {
              padding: 0px !important;
            }
            .es-m-p0r {
              padding-right: 0px !important;
            }
            .es-m-p0l {
              padding-left: 0px !important;
            }
            .es-m-p0t {
              padding-top: 0px !important;
            }
            .es-m-p0b {
              padding-bottom: 0 !important;
            }
            .es-m-p20b {
              padding-bottom: 20px !important;
            }
            .es-mobile-hidden,
            .es-hidden {
              display: none !important;
            }
            .es-desk-hidden {
              display: table-row !important;
              width: auto !important;
              overflow: visible !important;
              float: none !important;
              max-height: inherit !important;
              line-height: inherit !important;
            }
            .es-desk-menu-hidden {
              display: table-cell !important;
            }
            table.es-table-not-adapt,
            .esd-block-html table {
              width: auto !important;
            }
            table.es-social {
              display: inline-block !important;
            }
            table.es-social td {
              display: inline-block !important;
            }
          }
        </style>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
        
        <head>
            <meta charset="UTF-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
            <meta name="x-apple-disable-message-reformatting">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="telephone=no" name="format-detection">
            <title>Mdjamil is the Best Email Templete Desinger</title>
        </head>
        
        <body>
            <div class="es-wrapper-color">
                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" align="center" esd-custom-block-id="88594">
                                                <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p25t es-p20b es-p40r es-p40l" style="background-color: #3d5ca3;" bgcolor="#3d5ca3" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text" align="center">
                                                                                                <h2 style="color: #ffffff;">Meet our staff</h2>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p15t es-m-txt-l" align="center">
                                                                                                <p style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae interdum ligula. Pellentesque feugiat ligula ligula, in interdum dolor aliquet et.</p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table class="es-content" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" esd-custom-block-id="88594">
                                        <table class="es-content-body" style="background-color: #ffffff;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p25t es-p20b es-p40r es-p40l" style="border: 1px solid #000000"  align="left">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esd-container-frame" width="520" valign="top" align="center">
                                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="esd-block-text es-p15t es-m-txt-l" align="center">
                                                                                       '.$body.' 
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                                <table class="es-footer" cellspacing="0" width="600" style="background: #3d5ca3; width: 600px" bgcolor="#3d5ca3"  cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td class="esd-stripe" align="center" esd-custom-block-id="88592">
                                                <table class="es-footer-body" width="600" cellspacing="0" cellpadding="0" align="center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="esd-structure es-p20t es-p10r es-p10l" align="left">
                                                                <!--[if mso]><table width="580" cellpadding="0"
                                    cellspacing="0"><tr><td width="190" valign="top"><![endif]-->
                                                                <table class="es-left" cellspacing="0" cellpadding="0" align="left">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="es-m-p0r es-m-p20b esd-container-frame" width="190" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p5t es-m-txt-c" esdev-links-color="#ffffff" align="right">
                                                                                                <h4 style="color: #ffffff;">Follow us:</h4>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td><td width="20"></td><td width="370" valign="top"><![endif]-->
                                                                <table cellspacing="0" cellpadding="0" align="right">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="370" align="left">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-social es-m-txt-c" align="left">
                                                                                                <table class="es-table-not-adapt es-social" cellspacing="0" cellpadding="0">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td style="color: #ffffff;" class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Facebook" src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/facebook-rounded-gray.png" alt="Fb" width="32" height="32"></a></td>
                                                                                                            <td style="color: #ffffff;" class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Twitter" src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/twitter-rounded-gray.png" alt="Tw" width="32" height="32"></a></td>
                                                                                                            <td style="color: #ffffff;" class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Instagram" src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/instagram-rounded-gray.png" alt="Inst" width="32" height="32"></a></td>
                                                                                                            <td style="color: #ffffff;" class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Youtube" src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/youtube-rounded-gray.png" alt="Yt" width="32" height="32"></a></td>
                                                                                                            <td style="color: #ffffff;" class="es-p15r" valign="top" align="center"><a target="_blank" href><img title="Linkedin" src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/linkedin-rounded-gray.png" alt="In" width="32" height="32"></a></td>
                                                                                                            <td style="color: #ffffff;" class="es-p10r" valign="top" align="center"><a target="_blank" href><img title="Pinterest" src="https://tlr.stripocdn.email/content/assets/img/social-icons/rounded-gray/pinterest-rounded-gray.png" alt="P" width="32" height="32"></a></td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <!--[if mso]></td></tr></table><![endif]-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="esd-structure es-p5t es-p10b es-p10r es-p10l" align="left">
                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="esd-container-frame" width="580" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td class="esd-block-text es-p5t es-p10b" align="center">
                                                                                                <h5 style="color: rgb(82, 250, 3);">Contact us: <a style="color: rgb(255, 40, 201); text-decoration: none;" target="_blank" href="tel:123456789">123456789</a> | <a style="color: rgb(255, 40, 201); text-decoration: none;" target="_blank" href="mailto:your@mail.com">your@mail.com</a></h5>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="center" class="esd-block-text">
                                                                                                <p style="color: #ffffff;">This daily newsletter was sent to <a target="_blank" href="mailto:info@name.com"  style="color: rgb(255, 40, 201); text-decoration: none;">info@edu.com</a> from company name because you subscribed.</p>
                                                                                                <p style="color: #ffffff;">If you would not like to receive this email <a  style="color: rgb(255, 40, 201); text-decoration: none;" target="_blank" class="unsubscribe" href>unsubscribe here</a>.</p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </body>
        
        </html>
        ';
		return $template;
	}




}
