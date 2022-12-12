<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reset password &mdash; {$config["appName"]}</title>
        {include file='include/auth/head.tpl'}

                        <div class="login-signin">
                            <div class="mb-10">
                                <h3>Reset password</h3>
                            </div>
                            <form class="form" id="token_form">
                                <div class="form-group">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="New password" name="password" id="password" autocomplete="new-password" required />
                                </div>
                                <div class="form-group">
                                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="New password again" name="repasswd" id="repasswd" autocomplete="new-password" required />
                                </div>
                                <div class="form-group text-center mt-10" style="white-space:nowrap;">
                                    <button type="button" id="token_submit" class="btn btn-pill btn-outline-white btn-block font-weight-bold opacity-90 px-15 py-3">Change password</button>
                                </div>
                            </form>
                            <div class="mt-10">
                                <span class="opacity-70 mr-4">No account?</span>
                                <a href="/auth/register" class="text-white font-weight-bold">Register now</a>
                                <span class="mr-2 ml-2"> | </span>
                                <a href="/auth/login" class="text-white font-weight-bold">Back to login</a>
                            </div>
                        </div>

                        <script>
                            var token_value = '{$token}';
                        </script>

                        {include file='include/auth/scripts.tpl'}
    </body>
</html>