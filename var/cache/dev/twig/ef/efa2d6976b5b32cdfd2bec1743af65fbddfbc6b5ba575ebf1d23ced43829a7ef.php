<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* exchange_rates/rates.html.twig */
class __TwigTemplate_efe79c7468094db18957d3eeec59912d1b3b962944b69060797004b5968069e1 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "exchange_rates/rates.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "exchange_rates/rates.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "exchange_rates/rates.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Exchanger Rates | List";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        echo "    <link rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css\">
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
    <link rel='stylesheet' href = \" ";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        echo " \">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 12
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 13
        echo "    <div class=\"container\">
        <h1 class=\"align-center\"> Exchanges Rates For : ";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["base_currency"]) || array_key_exists("base_currency", $context) ? $context["base_currency"] : (function () { throw new RuntimeError('Variable "base_currency" does not exist.', 14, $this->source); })()), "html", null, true);
        echo "</h1>
        <div class='row'>
            <div class='col-6'>
                <select id='select_base_currency' class=\"form-input\">
                    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["base_currencies"]) || array_key_exists("base_currencies", $context) ? $context["base_currencies"] : (function () { throw new RuntimeError('Variable "base_currencies" does not exist.', 18, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["curr"]) {
            // line 19
            echo "                        <option ";
            if (($context["curr"] == (isset($context["base_currency"]) || array_key_exists("base_currency", $context) ? $context["base_currency"] : (function () { throw new RuntimeError('Variable "base_currency" does not exist.', 19, $this->source); })()))) {
                echo " selected='selected' ";
            }
            echo " value='";
            echo twig_escape_filter($this->env, $context["curr"], "html", null, true);
            echo "'
                            data-attr-href='";
            // line 20
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("show_rates");
            echo "?base=";
            echo twig_escape_filter($this->env, $context["curr"], "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $context["curr"], "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['curr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "                </select>
            </div>
            <div class='col-6'>
                <a href='";
        // line 25
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("exchange");
        echo "' class='btn btn-link btn-right'>Back</a>
                <button class='btn btn-success btn-right' id='add-exchange-rate'> Add </button>
                <a href='";
        // line 27
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("latestRates");
        echo "' class='btn btn-warning btn-right'>Refresh Rates</a>
            </div>
        </div>
        <br /><br />
        <hr />
        <div class='row'>
            <div class='row'>
                <table id=\"tbl-exchange-rate\" class=\"display\">
                    <thead>
                        <tr>
                            <th>Currency</th>
                            <th>Exchange Rate</th>
                            <th>Created On</th>
                            <th>Last updated On</th>                           
                            <th>Action</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["exchange_rates"]) || array_key_exists("exchange_rates", $context) ? $context["exchange_rates"] : (function () { throw new RuntimeError('Variable "exchange_rates" does not exist.', 45, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["rate"]) {
            // line 46
            echo "                            <tr>
                                <td>";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "currency", [], "any", false, false, false, 47), "html", null, true);
            echo "</td>
                                <td>";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "exchangeRate", [], "any", false, false, false, 48), "html", null, true);
            echo "</td>
                                <td>";
            // line 49
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "createdDatetime", [], "any", false, false, false, 49), "d-M-Y h:i a"), "html", null, true);
            echo "</td>
                                <td>";
            // line 50
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "updatedDatetime", [], "any", false, false, false, 50), "d-M-Y h:i a"), "html", null, true);
            echo "</td>
                                <td>
                                    <a href='";
            // line 52
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("deleteExchangeRate");
            echo "?id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "id", [], "any", false, false, false, 52), "html", null, true);
            echo "' class='btn btn-danger btn-right'>Delete</a>
                                    <button class='btn btn-warning btn-right edit-exchange-rate' data-rid=\"";
            // line 53
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "id", [], "any", false, false, false, 53), "html", null, true);
            echo "\" data-currency=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "currency", [], "any", false, false, false, 53), "html", null, true);
            echo "\" data-value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["rate"], "exchangeRate", [], "any", false, false, false, 53), "html", null, true);
            echo "\">Edit</button>
                                </td>
                            </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "                    </tbody>

                </table>
            </div>
            <div id='frm-exchange' style='display:none' title=\"Add exchange rate\">
                <input type='hidden' name='default_currency' id='default_currency' value='";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["base_currency"]) || array_key_exists("base_currency", $context) ? $context["base_currency"] : (function () { throw new RuntimeError('Variable "base_currency" does not exist.', 62, $this->source); })()), "html", null, true);
        echo "'/>
                <div>
                    <lable>Default Currency : ";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["base_currency"]) || array_key_exists("base_currency", $context) ? $context["base_currency"] : (function () { throw new RuntimeError('Variable "base_currency" does not exist.', 64, $this->source); })()), "html", null, true);
        echo "</lable>
                </div>
                <br/>
                <div>
                    <lable>Currency :</lable>
                    <br/>
                    <select id='currency' class=\"form-input\">
                        <option value=''>-- Select Currency --</option>
                        ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["currnecy_list"]) || array_key_exists("currnecy_list", $context) ? $context["currnecy_list"] : (function () { throw new RuntimeError('Variable "currnecy_list" does not exist.', 72, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
            // line 73
            echo "                            <option value='";
            echo twig_escape_filter($this->env, $context["currency"], "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, $context["currency"], "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "                    </select>
                </div><br/>
                <div>
                    <lable>Exchange Rate:</lable>
                    <input type='text' id='input-exchange-rate' class=\"form-input\" />
                </div>
                <br/>
                <div><input type='button' id='save-exchange-rate' data-rid=\"\" class=\"btn btn-link\" value='Save'/></div>
            </div>

        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 89
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 90
        echo "    <script src=\"https://code.jquery.com/jquery-3.3.1.js\"></script>
    <script src=\"https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js\"></script>
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <script src=\"";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/exchange-rates.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "exchange_rates/rates.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  302 => 93,  297 => 90,  287 => 89,  265 => 75,  254 => 73,  250 => 72,  239 => 64,  234 => 62,  227 => 57,  213 => 53,  207 => 52,  202 => 50,  198 => 49,  194 => 48,  190 => 47,  187 => 46,  183 => 45,  162 => 27,  157 => 25,  152 => 22,  140 => 20,  131 => 19,  127 => 18,  120 => 14,  117 => 13,  107 => 12,  95 => 9,  90 => 6,  80 => 5,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Exchanger Rates | List{% endblock %}

{% block stylesheets %}
    <link rel=\"stylesheet\" href=\"https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css\">
    <link rel=\"stylesheet\" href=\"//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
    <link rel='stylesheet' href = \" {{ asset('assets/css/style.css')}} \">
{% endblock %}

{% block body %}
    <div class=\"container\">
        <h1 class=\"align-center\"> Exchanges Rates For : {{ base_currency }}</h1>
        <div class='row'>
            <div class='col-6'>
                <select id='select_base_currency' class=\"form-input\">
                    {% for curr in base_currencies%}
                        <option {% if curr == base_currency %} selected='selected' {% endif %} value='{{ curr }}'
                            data-attr-href='{{ path('show_rates') }}?base={{ curr }}'>{{ curr }}</option>
                    {% endfor %}
                </select>
            </div>
            <div class='col-6'>
                <a href='{{ path('exchange') }}' class='btn btn-link btn-right'>Back</a>
                <button class='btn btn-success btn-right' id='add-exchange-rate'> Add </button>
                <a href='{{ path('latestRates') }}' class='btn btn-warning btn-right'>Refresh Rates</a>
            </div>
        </div>
        <br /><br />
        <hr />
        <div class='row'>
            <div class='row'>
                <table id=\"tbl-exchange-rate\" class=\"display\">
                    <thead>
                        <tr>
                            <th>Currency</th>
                            <th>Exchange Rate</th>
                            <th>Created On</th>
                            <th>Last updated On</th>                           
                            <th>Action</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        {% for rate in exchange_rates%}
                            <tr>
                                <td>{{ rate.currency }}</td>
                                <td>{{ rate.exchangeRate }}</td>
                                <td>{{ rate.createdDatetime|date('d-M-Y h:i a') }}</td>
                                <td>{{ rate.updatedDatetime|date('d-M-Y h:i a') }}</td>
                                <td>
                                    <a href='{{ path('deleteExchangeRate') }}?id={{ rate.id}}' class='btn btn-danger btn-right'>Delete</a>
                                    <button class='btn btn-warning btn-right edit-exchange-rate' data-rid=\"{{ rate.id}}\" data-currency=\"{{ rate.currency}}\" data-value=\"{{ rate.exchangeRate}}\">Edit</button>
                                </td>
                            </tr>
                        {% endfor %}
                    </tbody>

                </table>
            </div>
            <div id='frm-exchange' style='display:none' title=\"Add exchange rate\">
                <input type='hidden' name='default_currency' id='default_currency' value='{{ base_currency }}'/>
                <div>
                    <lable>Default Currency : {{ base_currency }}</lable>
                </div>
                <br/>
                <div>
                    <lable>Currency :</lable>
                    <br/>
                    <select id='currency' class=\"form-input\">
                        <option value=''>-- Select Currency --</option>
                        {% for currency in currnecy_list%}
                            <option value='{{ currency }}'>{{ currency }}</option>
                        {% endfor %}
                    </select>
                </div><br/>
                <div>
                    <lable>Exchange Rate:</lable>
                    <input type='text' id='input-exchange-rate' class=\"form-input\" />
                </div>
                <br/>
                <div><input type='button' id='save-exchange-rate' data-rid=\"\" class=\"btn btn-link\" value='Save'/></div>
            </div>

        </div>
    </div>
{% endblock %}

{% block javascripts %}
    <script src=\"https://code.jquery.com/jquery-3.3.1.js\"></script>
    <script src=\"https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js\"></script>
    <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
    <script src=\"{{ asset('assets/js/exchange-rates.js') }}\"></script>
{% endblock %}
", "exchange_rates/rates.html.twig", "C:\\xampp\\htdocs\\projects\\exchanger\\currency-exchange-rates\\templates\\exchange_rates\\rates.html.twig");
    }
}
