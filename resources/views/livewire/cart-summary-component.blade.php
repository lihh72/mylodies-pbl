<div class="space-y-2 text-sm text-[#3c2f24]">
    <div class="flex justify-between"><span>Total Items</span><span>{{ $count }}</span></div>
    <div class="flex justify-between font-semibold"><span>Total Rental Price</span><span>IDR {{ number_format($total, 0, ',', '.') }}</span></div>
    <p class="text-xs italic text-[#7e6a57] pt-2">*Final cost will include tax, deposit, and delivery fees in the next step.</p>
</div>
