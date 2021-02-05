<br>
<main class="flex-grow  max-w-7xl mx-auto xl:px-8 lg:flex">
    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5 w-screen pl-10 pr-10">
        <form class="space-y-8 divide-y divide-gray-200 w-full" method="post" action="<?php echo base_url(); ?>/newproject/post" enctype="multipart/form-data">
            <div class="" >
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Profile
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    This information will be displayed publicly so be careful what you share.
                </p>
                <?php if($this->session->getFlashdata('msg')){echo $this->session->getFlashdata('msg');} ?>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm sm:border-gray-200 sm:pt-5">
                    <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Enter a Blog or Client name<span class="required">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2 pb-4">
                        <div class="max-w-lg flex rounded-md shadow-sm ">
                            <input type="text" name="username" id="username"  class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
                        </div>
                        <div class="err"></div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="url" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Url
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">

                            <input type="text" name="url" id="url"  placeholder="https://www.xyz.com" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300">
                        </div>
                        <img id="preview_img" src="" class="pt-6" width="200"/>
                        <input type="hidden" name="logo_url" id="logo_url" value="">
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 url-logo" style="display:none">
                    <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        logo
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2 url-src">

                    </div>
                </div>

                <!--                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="photo" class="block text-sm font-medium text-gray-700">
                                        Photo
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="flex items-center">
                                            <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </span>
                                            <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Change
                                            </button>
                                        </div>
                                    </div>
                                </div>-->

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="cover_photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Cover Image
                    </label>
                    <div class="mt-2 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="avatar" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                         <div class="err_ext" ></div>
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="photo" class="block text-sm font-medium text-gray-700">
                        Connect to WordPress
                    </label>
                    <button type="button" aria-pressed="false" id="wp-button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="sr-only">Use setting</span>
                        <!-- On: "translate-x-5", Off: "translate-x-0" -->
                        <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0"></span>
                    </button>
                    <input type="hidden" name="wp-input" id="wp-input" value="">
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" id="cancel-fm" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </button>
                        <button type="submit" id="submit-fm" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</main>
</div>
<script>
//    $(document).ready(function(){
//        
//    });
    $('#wp-button').click(function () {
        if ($('#wp-button .ease-in-out').hasClass('translate-x-0')) {
            $('#wp-button .translate-x-0').addClass('translate-x-5');
            $('#wp-button .translate-x-0').removeClass('translate-x-0');
            $(this).addClass('bg-indigo-600');
            $('#wp-input').val(1);
        } else {
            $('#wp-button .translate-x-5').addClass('translate-x-0');
            $('#wp-button .translate-x-5').removeClass('translate-x-5');
            $(this).removeClass('bg-indigo-600');
            $('#wp-input').val(0);
        }
    });
    $('#url').on('blur', function () {
        var url = $('#url').val();
        $.ajax({
            url: '<?php echo base_url() . '/mh' ?>',
            type: "POST",
            data: {data: url},
            dataType: 'json',
            success: function (data) {
                var src = '<?php echo base_url() ?>/assets/uploads/' + data + '.png';
                $('#preview_img').attr('src', src);
                $('#logo_url').val(src);
            },
        });
    });

    $("form").submit(function () {
     $('.clear_all').remove();
     var ext = $('#file-upload').val().split('.').pop().toLowerCase();
        if (!$('#username').val()) {
            $('.err').html("<span class='required clear_all'' >Field must be required</span>");
            return false;
        }else if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
                 $('.err_ext').html("<span class='required clear_all'' >File have invalid extension</span>");
                 return false;
        }else {
           // $('form').submit();

        }
    });
    $("#cancel-fm").click(function(){
        window.location.href = '<?php echo base_url();?>/dashboard';
    });
    
    

</script>