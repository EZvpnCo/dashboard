<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8"/>
        <title>An error occurred &mdash; {$config["appName"]}</title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="{$metron['assets_url']}/css/fonts.css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
        <link href="{$metron['assets_url']}/css/pages/error/error-6.css?v=7.0.3" rel="stylesheet" type="text/css"/>
        <link href="{$metron['assets_url']}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{$metron['assets_url']}/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="/favicon.ico"/>
</head>
    <body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >
        <div class="d-flex flex-column flex-root">
            <div class="error error-6 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url({$metron['assets_url']}/media/error/bg6.jpg);">
                <div class="d-flex flex-column flex-row-fluid text-center">
                    <h1 class="error-title font-weight-boldest text-white mb-12" style="margin-top: 12rem;">405 error</h1>
                    <p class="display-4 font-weight-bold text-white">
                        Bad request<br/>
                        Please return to try again
                    </p>
                    <div>
                        <a href="/user" class="btn btn-light">Return to the home page</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
