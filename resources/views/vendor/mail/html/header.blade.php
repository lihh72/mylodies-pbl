@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Mylodies')
<img src="https://mylodies.xyz/images/logo-background.png" class="logo" alt="Mylodies Logo">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
