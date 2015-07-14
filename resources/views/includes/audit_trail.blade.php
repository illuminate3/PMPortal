
								<td>{{ $history->fieldName() }} </td>

								@if ( $history->fieldName() == "Target Date" || $history->fieldName() == "Actual Date")

									@if ($history->oldValue() != "0000-00-00")
										<?php $historyoldDate = DateTime::createFromFormat('Y-m-d', $history->oldValue())->format('M j, Y'); ?>
									@elseif ($history->oldValue() == "0000-00-00")
										<?php $historyoldDate = "Null" ?>
									@else
										<?php $historyoldDate = $history->oldValue() ?>
									@endif

									@if ($history->newValue() == "")
										<?php $historynewDate = "Null" ?>
									@else
										<?php $historynewDate = DateTime::createFromFormat('Y-m-d H:i:s', $history->newValue())->format('M j, Y'); ?>
									@endif

									
								@endif

								<td>
								<?php if (($history->fieldName() == "Target Date") || ($history->fieldName() == "Actual Date") ) { ?>
									{{ $historyoldDate }}
								<?php } else { ?>			
									{{ $history->oldValue()}}
								<?php } ?>				
								</td>
								
								<td>
								<?php if (($history->fieldName() == "Target Date") || ($history->fieldName() == "Actual Date") ) { ?>
									{{ $historynewDate}}
								<?php } else { ?>			
									{{ $history->newValue()}}
								<?php } ?>		
								</td>
								
								<td>{{ $history->updated_at->format('M j, Y h:i A') }}</td>