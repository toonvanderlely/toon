<h1>Bestelling #{{ $order->slug }}</h1>
<p><em>{{ $order->name }} ({{ $order->speltak }})</em></p>

<p>Uw bestelling is aangekomen op het Scoutinggebouw! Het is voor ons erg handig als u het bovenstaande nummer bij de hand heeft bij het ophalen.</p>

<p><strong>Ophalen</strong></p>
<p>{{ $pickup }}</p>

<hr>
<table class="table mb-5">
    <?php $total = 0; ?>
    @foreach($order->rules as $rule)
        <tr>
            <td>{{ $rule->product }}</td>
            <td>{{ $rule->type }} {{ $rule->size }}</td>
            <td class="text-right">&euro;{{ $rule->price }}</td>
            <?php $total += $rule->price; ?>
        </tr>
    @endforeach
    <tr>
        <td colspan="2"><strong>Totaal</strong></td>
        <td class="text-right"><strong>&euro;{{ number_format($total, 2) }}</strong></td>
    </tr>
</table>