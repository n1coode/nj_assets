/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function($) 
{
	$(function() 
	{
		var __STATUS_SELECTED			= 'selected';
		var __STATUS_DESELECTED			= 'de'+__STATUS_SELECTED;
		
		var __DATA_DEVICE				= 'device';
		var __DATA_ORIENTATION			= 'orientation';
		
		var _devicesContainer			= 'n1deviceList';
		var _devicesSelector			= '#'+_devicesContainer;
		var uid							= $(_devicesSelector).attr('data-uid');
		var extkey						= $(_devicesSelector).attr('data-extkey');
		var _deviceSelector				= _devicesSelector+' .device';
		var _deviceInputSelector		= 'input[name*="data[tt_content]['+uid+']['+extkey+'_device]"]';
		var _deviceFieldGet				= 'data[tt_content]['+uid+']['+extkey+'_device]';
		var selectedDevices				= '';
		
		var _orientationsSelector		= _deviceSelector + ' .orientations';
		var _orientationSelector		= _orientationsSelector + ' .orientation';
		var _orientationInputSelector	= 'input[name*="data[tt_content]['+uid+']['+extkey+'_orientation]"]';
		
	
		$(document).ready(function()
		{
			n1t3backend_setSelectedItems(_deviceInputSelector,_deviceSelector,__DATA_DEVICE);
			n1t3backend_setSelectedItems(_orientationInputSelector,_orientationSelector,__DATA_ORIENTATION);
			
			
		/**
		 * $selectorInputDevice = '\'input[name*="data[tt_content]['.$this->contentUid.']['.$this->nj_ext_key.'_device]"]\'';
			$selectorInputOrientation = '\'input[name*="data[tt_content]['.$this->contentUid.']['.$this->nj_ext_key.'_orientation]"]\'';
			$selectorCheckboxOrientation = '\'input:hidden[name="data[tt_content]['.$this->contentUid.']['.$this->nj_ext_key.'_orientation_enable]"]\'';
			$selectorOrientation = $selectorDevice.' .orientation';
			$selectorOrientationOption = $selectorOrientation.' .option';
		 */	
			
			$(_deviceSelector).click(function(event)
			{
				 n1t3backend_toggleSelectedDevice($(this));
			});
			
			$(_orientationSelector).click(function(event)
			{
				event.stopPropagation();
				n1t3backend_toggleSelectedOrientation($(this));
			});
		});
		
		
		
		
		/**
		 * @param {string} $inputSelector
		 * @param {string} $itemSelector
		 * @param {string} $attrName
		 * @returns {void}
		 */
		function n1t3backend_setSelectedItems($inputSelector,$itemSelector,$attrName)
		{
			var input = $($inputSelector).val();
			
			$($itemSelector).each(function()
			{
				if(input.toLowerCase().indexOf($(this).attr('data-'+$attrName)) > -1)
				{
					$(this).addClass(__STATUS_SELECTED);
				} 
				else
				{
					$(this).addClass(__STATUS_DESELECTED);
				}
			}); 
		}
		
		
		function n1t3backend_toggleSelectedOrientation($this) 
		{
			var device = $this.parents('.'+__DATA_DEVICE).attr('data-'+__DATA_DEVICE);
			
			console.log(device);
			
			var orientation = $('.'+__DATA_DEVICE + '.'+device + ' .' + __DATA_ORIENTATION);
			
			if($this.hasClass(__STATUS_DESELECTED))
			{
				if(orientation.not($this).hasClass(__STATUS_SELECTED))
				{
					orientation.each(function(){
						$(this)
							.removeClass(__STATUS_DESELECTED)
							.removeClass(__STATUS_SELECTED)
							.addClass(__STATUS_DESELECTED);
					});
				}
				else
				{
					$this.removeClass(__STATUS_DESELECTED).addClass(__STATUS_SELECTED);
				}
			}
			else
			{
				$this.removeClass(__STATUS_SELECTED).addClass(__STATUS_DESELECTED);
			}
			n1updateInputOrientations();
		}
		
		function n1t3backend_toggleSelectedDevice($this)
		{
			if($this.hasClass(__STATUS_DESELECTED))
			{
				$this.removeClass(__STATUS_DESELECTED).addClass(__STATUS_SELECTED);
			}
			else
			{
				$this.removeClass(__STATUS_SELECTED).addClass(__STATUS_DESELECTED);
			}
			
			$(_orientationsSelector).fadeOut(250);
			var x = 0;
			var duration = 125;
			$(_deviceSelector).each(function(){
				$(this).delay(x * duration).animate({maxHeight:0},duration);
				x++;
			});
			
			timeoutInterval(function()
			{
				x = 0;
				$(_deviceSelector).each(function(){
					$(this).delay(x * duration).animate({maxHeight:'100%'},duration);
					x++;
				});
				
				
				selectedDevices = '';
				
				var orientationsTablet = false;
				var orientationsMobile = false;
				
				$(_deviceSelector).each(function(){
					if($(this).hasClass(__STATUS_SELECTED))
					{
						if($(this).hasClass("tablet")) orientationsTablet = true;
						if($(this).hasClass("mobile")) orientationsMobile = true;
						
						if(selectedDevices.length > 0)
						{
							selectedDevices = selectedDevices.concat(' ');
						}
						selectedDevices = selectedDevices.concat($(this).attr('data-device'));
						console.log(selectedDevices);
					}
					
				});
				
				if(orientationsTablet) $(_deviceSelector + '.tablet .orientations').fadeIn(250);
				if(orientationsMobile) $(_deviceSelector + '.mobile .orientations').fadeIn(250);
				
				n1updateInputDevices(selectedDevices);
				n1updateInputOrientations();
				
			},$(_deviceSelector).length * duration,1);
				
		}
		
		function n1updateInputDevices($selectedDevices)
		{
			$(_deviceInputSelector).val($selectedDevices);
			$('input[data-formengine-input-name="data[tt_content]['+uid+'][tx_njpage_device]"]').val($selectedDevices);
		};
		
		function n1updateInputOrientations()
		{
			var selectedOrientations = '';
			
			$(_deviceSelector + '.' + __STATUS_SELECTED).each(function()
			{
				$(this).find('[data-' + __DATA_ORIENTATION + '].' + __STATUS_SELECTED).each(function()
				{
					if(selectedOrientations.length > 0)
					{
						selectedOrientations = selectedOrientations.concat(' ');
					}
					console.log('data-'+__DATA_ORIENTATION);
					selectedOrientations = selectedOrientations.concat($(this).attr('data-'+__DATA_ORIENTATION));
				});
			});
			$(_orientationInputSelector).val(selectedOrientations);
			$('input[data-formengine-input-name="data[tt_content]['+uid+'][tx_njpage_orientation]"]').val(selectedOrientations);
		}
		
		/**
		 * Description: Alternative method to the evil setInterval
		 * @param {Function} func | Function to be called.
		 * @param {number} wait | Delay time.
		 * @param {number} times | Number of passes. Leave blank if should run endlessly.
		 * @returns {void}
		 */
		function timeoutInterval(func, wait, times)
		{
			var interv = function(w, t){
				return function(){
					if(typeof t === "undefined" || t-- > 0){
						setTimeout(interv, w);
						try{
							func.call(null);
						}
						catch(e){
							t = 0;
							throw e.toString();
						}
					}
				};
			}(wait, times);
			setTimeout(interv, wait);
		};
		
	});
	
})(TYPO3.jQuery);





function n1getSelectedItems($selector)
				{
					$items = "";
					
					$($selector+".selected").each(function()
					{
						$items = $items + $(this).attr("name") + " ";
					});
					
					return $items;
				};


/**
 * 
 * $(document).ready(function()
                    {
						$devices = $('.$selectorInputDevice.').val();
						n1setSelectedItems("'.$selectorDevice.'",$devices);
						if(n1orientationIsEnabled())
						{
							$("'.$selectorDevice.'.selected .orientation").slideDown();
							$orientations = $('.$selectorInputOrientation.').val();
							n1setSelectedItems("'.$selectorOrientationOption.'",$orientations);
						}
						
						$(document).on("click","'.$selectorDevice.' .selection",function()
						{
							n1toggleSelectedDevice($(this).parent());
							$devices = n1getSelectedItems("'.$selectorDevice.'");
							n1updateInput('.$selectorInputDevice.',"'.$this->nj_ext_key.'_device", $devices);
						});
						

						$(document).on("change",'.$selectorInputDevice.',function()
						{
							$devices = $(this).val();

							$i=0;
							if($devices !== "")
							{
								$("'.$selectorDevice.'").each(function()
								{
									if($devices.indexOf($(this).attr("name")) > -1)
									{
										$i++;
									}
								});
							}

							$("'.$selectorDevice.'").removeClass("selected");

							if($i > 0)
							{
								n1setSelectedItems("'.$selectorDevice.'",$devices);
							}

							$devices = n1getSelectedItems("'.$selectorDevice.'");
							n1updateInput('.$selectorInputDevice.',"'.$this->nj_ext_key.'_device", $devices);
						}); 


						$('.$selectorInputDevice.').closest("SPAN").click(function()
						{
							$('.$selectorInputDevice.').trigger("change");
						});
						

						$(document).on("click","'.$selectorOrientationOption.'",function()
						{
							if($(this).hasClass("selected"))
							{
								$(this).removeClass("selected");
							}
							else
							{
								$(this).parent().children(".option").removeClass("selected");
								$(this).addClass("selected");
							}
							$orientations = n1getSelectedItems("'.$selectorOrientationOption.'");
							n1updateInput('.$selectorInputOrientation.',"'.$this->nj_ext_key.'_orientation", $orientations);
						});
					});
				});


	
				function n1setSelectedItems($selector,$value)
				{
					$($selector).each(function()
						{
							if($value.indexOf($(this).attr("name")) > -1)
							{
								$(this).addClass("selected");
							} 
					}); 
				}



				function n1orientationIsEnabled()
				{
					if($('.$selectorCheckboxOrientation.').val() > 0)
					{
						return true;
					}
					return false;
				}

				function n1toggleSelectedDevice($this)
				{
					if(!$this.hasClass("selected"))
					{
						$this.addClass("selected");
						if(n1orientationIsEnabled()) $this.children(".orientation").slideDown();
					} 
					else
					{
						$this.removeClass("selected");
						if(n1orientationIsEnabled()) $this.children(".orientation").slideUp();
					}
				};

				function n1getSelectedItems($selector)
				{
					$items = "";
					
					$($selector+".selected").each(function()
					{
						$items = $items + $(this).attr("name") + " ";
					});
					
					return $items;
				};
				
				function n1updateInput($inputSelector, $inputField, $value)
				{
				console.log($($inputSelector));
					$($inputSelector).val($value);
					
					$field = "data[tt_content]['.$this->contentUid.']["+$inputField+"]";
					
					typo3form.fieldGet("data[tt_content]['.$this->contentUid.'][tx_njcollection_device]","trim","",0,"");
					TBE_EDITOR.fieldChanged("tt_content","'.$this->contentUid.'","tx_njcollection_device","data[tt_content]['.$this->contentUid.'][tx_njcollection_device]");

				};
 * 
 * 
 * 
 */