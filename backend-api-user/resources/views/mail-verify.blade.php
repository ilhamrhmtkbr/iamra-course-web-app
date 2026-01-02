<!DOCTYPE html>
<html>
<head>
    <title>{{ __('email.subject') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
<!-- Main Container -->
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f4f4f4;">
    <tr>
        <td style="padding: 20px 0;">
            <!-- Email Container -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">

                <!-- Header -->
                <tr>
                    <td style="background-color: #0060fa; padding: 40px 30px; text-align: center; border-radius: 8px 8px 0 0;">
                        <h1 style="margin: 0; color: #ffffff; font-size: 28px; font-weight: bold;">
                            {{ config('app.name') }}
                        </h1>
                        <p style="margin: 10px 0 0 0; color: #ffffff; font-size: 16px; opacity: 0.9;">
                            {{ __('email.subject') }}
                        </p>
                    </td>
                </tr>

                <!-- Main Content -->
                <tr>
                    <td style="padding: 40px 30px;">
                        <!-- Greeting -->
                        <h2 style="margin: 0 0 20px 0; color: #333333; font-size: 24px; text-align: center;">
                            {{ __('email.greeting', ['name' => $name]) }}
                        </h2>

                        <!-- Message -->
                        <p style="margin: 0 0 30px 0; color: #666666; font-size: 16px; line-height: 1.6; text-align: center;">
                            {{ __('email.message') }}
                        </p>

                        <!-- CTA Button -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: center; padding: 20px 0;">
                                    <a href="{{ $signedUrl }}"
                                       style="display: inline-block;
                                                  background-color: #0060fa;
                                                  color: #ffffff;
                                                  text-decoration: none;
                                                  padding: 16px 32px;
                                                  border-radius: 6px;
                                                  font-size: 16px;
                                                  font-weight: bold;
                                                  border: none;
                                                  box-shadow: 0 2px 4px rgba(0,96,250,0.3);">
                                        {{ __('email.button') }}
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <!-- Divider -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 30px 0;">
                            <tr>
                                <td style="border-top: 1px solid #eeeeee;"></td>
                            </tr>
                        </table>

                        <!-- Footer Message -->
                        <p style="margin: 0 0 10px 0; color: #888888; font-size: 14px; text-align: center;">
                            {{ __('email.footer') }}
                        </p>

                        <p style="margin: 10px 0 0 0; color: #888888; font-size: 14px; text-align: center;">
                            {{ __('email.regards') }}
                        </p>

                        <p style="margin: 5px 0 0 0; color: #0060fa; font-size: 14px; font-weight: bold; text-align: center;">
                            {{ __('email.team', ['app' => config('app.name')]) }}
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background-color: #f8f9fa; padding: 30px; text-align: center; border-radius: 0 0 8px 8px; border-top: 1px solid #eeeeee;">
                        <p style="margin: 0 0 10px 0; color: #999999; font-size: 12px;">
                            © 2024 {{ config('app.name') }}. All rights reserved.
                        </p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
