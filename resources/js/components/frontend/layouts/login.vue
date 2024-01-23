<template>
	<div>	
        <slot name="frontbody"></slot>
        <FlashMessage :position="'right bottom'"></FlashMessage>
    </div>
</template>

<script>
export default {
    data()
    {
        return{

        }
    },
    mounted()
    {
         $('body').click(function(e)
        {
            if($(e.target).closest('.lblClasi').length === 1 || $(e.target).closest('.select-heading-list').length == 1 || $(e.target).closest('.right-cros').length === 1)
            {		
                if($(e.target).closest('.select-heading-list').length == 1)
                {
                    $('.select-heading-list').show();
                    $('.select-heading-list').addClass('show').removeClass('hide');
                    $('.selectSpan').html('<i class="fa fa-angle-up"></i>')
                }
                else if($(e.target).closest('.right-cros').length === 1)
                {

                }
                else
                {
                    if($('.select-heading-list').hasClass('hide'))
                    {		
                        $('.select-heading-list').show();
                        $('.select-heading-list').addClass('show').removeClass('hide');
                        $('.selectSpan').html('<i class="fa fa-angle-up"></i>')
                    }
                    else if($('.select-heading-list').hasClass('show'))
                    {		
                        $('.select-heading-list').hide();
                        $('.select-heading-list').addClass('hide').removeClass('show');
                        $('.selectSpan').html('<i class="fa fa-angle-down"></i>')
                    }
                }
                
            }
            else
            {			
                $('.select-heading-list').hide();
                $('.select-heading-list').addClass('hide').removeClass('show');
                $('.selectSpan').html('<i class="fa fa-angle-down"></i>')
            }


            if($(e.target).closest('.lblLocation').length === 1 ||  $(e.target).closest('.right-cros1').length === 1 || $(e.target).closest('.locationList').length === 1)
            {		

                if($(e.target).closest('.locationList').length == 1)
                {
                    $('.locationList').show();
                    $('.locationList').addClass('show').removeClass('hide');
                    $('.selectSpan1').html('<i class="fa fa-angle-up"></i>')
                }
                else if($(e.target).closest('.right-cros1').length === 1)
                {

                }
                else
                {
                    if($('.locationList').hasClass('hide'))
                    {				
                        $('.locationList').show();
                        $('.locationList').addClass('show').removeClass('hide');
                        $('.selectSpan1').html('<i class="fa fa-angle-up"></i>')
                    }
                    else if($('.locationList').hasClass('show'))
                    {		
                        $('.locationList').hide();
                        $('.locationList').addClass('hide').removeClass('show');
                        $('.selectSpan1').html('<i class="fa fa-angle-down"></i>')
                    }
                }
                
            }
            else
            {			

                $('.locationList').hide();
                $('.locationList').addClass('hide').removeClass('show');
                $('.selectSpan1').html('<i class="fa fa-angle-down"></i>')
            

            }
            
        });
        
        $('body').on('click','.indChk', function()
        {
            
            var dataId = $(this).attr('data-id');            
            if($(this).hasClass('mainChk'))
            {
                if($(this).prop('checked') == true)
                {						
                    $('#all_'+dataId).prop('checked',true);
                    $('#nestedMenu_'+dataId).show();
                }
                else
                {					
                    $('#all_'+dataId).prop('checked',false);
                    $('#nestedMenu_'+dataId).hide();	
                    $('#mainLi_'+dataId+' input[type=checkbox]').each(function() 
                    {
                        if(!$(this).hasClass('mainChk') &&  !$(this).hasClass('all'))
                        {
                            console.log($(this).attr('class'));
                            $(this).prop('checked',false);
                        }
                    });
                }		
            }

            if($(this).hasClass('child'))
            {               
                var nestedMenu = $(this).parent().parent().parent().parent();
                var nestedMenuId = $(this).parent().parent().parent().parent().attr('id');
                var dataId = $(this).parent().parent().parent().parent().attr('data-id');
                var checkedChk = nestedMenu.find("input:checked").map(function(){return this.value});
                console.log(checkedChk.length)
                if(checkedChk.length >= 1)
                {                
                    $('#all_'+dataId).prop('checked',false);
                    $('#all_count_'+dataId).css({ 'font-weight' : '' });
                }
                else if(checkedChk.length < 1)
                {
                    $('#all_'+dataId).prop('checked',true);
                    $('#all_count_'+dataId).css({ 'font-weight' : '600 !important' });
                }
            }

            if($(this).hasClass('all'))
            {
                if($(this).prop('checked') == true)
                {
                    $('#mainChk_'+dataId).prop('checked',true);			
                    $('#nestedMenu_'+dataId).show();
                    $('#mainLi_'+dataId+' input[type=checkbox]').each(function() 
                    {
                        if(!$(this).hasClass('mainChk') &&  !$(this).hasClass('all'))
                        {
                            $(this).prop('checked',false);
                        }
                    });				
                }
                else
                {
                    
                    $('#mainChk_'+dataId).prop('checked',false);			
                    $('#nestedMenu_'+dataId).hide();
                    $('#mainLi_'+dataId+' input[type=checkbox]').each(function() 
                    {
                        if(!$(this).hasClass('mainChk') &&  !$(this).hasClass('all'))
                        {
                            $(this).prop('checked',false);
                        }
                    });	
                    
                }
            }
            var mainChkLength = $('.mainChk:checked').length;
            if(mainChkLength == 1)
            {
                $('#lblClasi').addClass('crossIcon');
                var lblText = $('.mainChk:checked').next().text();
                var lblTextLength = lblText.length;
                if(lblTextLength > 20)
                {
                    lblText = lblText.substring(0,17);
                    lblText = lblText+'...';
                    $('.lblDrp').text(lblText);
                }
                else
                {
                    $('.lblDrp').text(lblText);
                }
                
            }
            else if(mainChkLength > 1)
            {
                var lblText = mainChkLength+' Industries';
                $('.lblDrp').text(lblText);
                $('#lblClasi').addClass('crossIcon');
            }
            else if(mainChkLength == 0)
            {
                var lblText = 'Choose Industry';
                $('.lblDrp').text(lblText);
                $('#lblClasi').removeClass('crossIcon');
            }

        });

        $('body').on('click','.locChk', function()
        {
            var dataId = $(this).attr('data-id');	
            var mainChkLength = $('.mainChk1:checked').length;
            if(mainChkLength == 1)
            {
                $('#lblLocation').addClass('crossIcon');
                var lblText = $('.mainChk1:checked').next().text();
                var lblTextLength = lblText.length;
                if(lblTextLength > 20)
                {
                    lblText = lblText.substring(0,17);
                    lblText = lblText+'...';
                    $('.lblDrpLocation').text(lblText);
                }
                else
                {
                    $('.lblDrpLocation').text(lblText);
                }
                
            }
            else if(mainChkLength > 1)
            {
                var lblText = mainChkLength+' Locations';
                $('.lblDrpLocation').text(lblText);
                $('#lblLocation').addClass('crossIcon');
            }
            else if(mainChkLength == 0)
            {
                var lblText = 'Choose Location';
                $('.lblDrpLocation').text(lblText);
                $('#lblLocation').removeClass('crossIcon');
            }

        });

        $('body').on('click','.right-cros', function()
        {
            $('.indChk').each(function()
            {
                $(this).prop('checked',false);
            });
            $('#lblClasi').removeClass('crossIcon');
            $('.lblDrp').text('Choose Industry');
            $('.nestedMenu').hide();
        });

        $('body').on('click','.right-cros1', function()
        {
            $('.locChk').each(function()
            {
                $(this).prop('checked',false);
            });
            $('#lblLocation').removeClass('crossIcon');
            $('.lblDrpLocation').text('Choose Location');
        });

        $( document ).ready(function() 
        {
            $("body").delegate(".selectpicker", "changed.bs.select", function() 
            {
                var selectedItem = $('.selectpicker').val();
                if(selectedItem != '')
                {
                    $(this).parent().parent().addClass('crossIcon');
                }
                else
                {
                    $(this).parent().parent().removeClass('crossIcon');
                }
                
            });

        });

        $('.rm-mustard').click(function() 
        {
            $('.remove-example').find('.Mustard').hide();
            $('.remove-example').selectpicker('refresh');
        });
        $('.rm-mustard1').click(function() 
        {            
            $('.remove-example').find('.Mustard').show();
            $('.remove-example').selectpicker('refresh');
        });
    }
}
</script>