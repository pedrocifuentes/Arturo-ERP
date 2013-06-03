<?php $view->extend('::base.html.php') ?>

<h1>Providers Rates</h1>
<table class="record_properties">
    <tbody>
        <tr>
            <th>Rate Id</th>
            <td><?php echo $entity->getId(); ?></td>
        </tr>
        <tr>
            <th>Supplier</th>
            <td><?php echo $entity->getProdProvider(); ?></td>
        </tr>
        <tr>
            <th>Fromdate</th>
            <td><?php echo $entity->getFromDate(); ?></td>
        </tr>
        <tr>
            <th>Todate</th>
            <td>{{ entity.toDate|date('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Cotton price ($/kg)</th>
            <td>{{ entity.cottonPrice }}</td>
        </tr>
        <tr>
            <th>Model</th>
            <td>
                <select name="model" id="model">
                    <option value="0">All</option>
                    {% for model in models %}
                    <option value="{{ model.id }}">{{ model.code }}</option>
                    {% endfor %}
                </select>
            </td>
        </tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    </tbody>
</table>
<table width="100%">
    <thead>
    <th>Models</th>
    <?php
    foreach ($group_colors as $gc) {
        echo "<th>" . $gc->getName() . "</th>";
    }
    ?>
</thead>
<tbody>
    {% for model in models %}
    <tr>
        <td>{{ model.code }}</td>
        <td>
            <table>
                <tr>
                    {% for ts in model.tallas %}
                    <td> {{ ts.name }}</td>
                    {% endfor %}
                </tr>
                <tr>
                    {% for ts in model.tallas %}
                    <?php
                    $prexdoce = '00,00';
                    $key = "{{ gc.id }}.'-'.{{ model.id }}.'-'.{{ ts.id }}";
                    ?>
                    <td class="tallpricedetall" vacios="<?php echo $empty_cell_left; ?>">
                        {% if ts.id %}
                        00,00
                        {% else %}
                        00,00
                        {% endif %}
                    </td>
                    {% endfor %}
                </tr>
            </table>
        </td>
        {% endfor %}
    </tr>
    {% endfor %}
</tbody>
</table>
<ul class="record_actions">
    <li>
        <a href="{{ path('prodprices') }}">
            Back to the list
        </a>
    </li>
    <li>
        <a id="btn-edit" class="btn btn-primary" href="#">Edit</a>
    </li>
</ul>
