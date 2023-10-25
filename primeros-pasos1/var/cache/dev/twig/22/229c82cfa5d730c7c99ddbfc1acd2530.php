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

/* datos_contacto.html.twig */
class __TwigTemplate_d0569af1f6c7543dbf0d096a24730755 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "datos_contacto.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "datos_contacto.html.twig"));

        // line 1
        echo "<ul>
    <li><a href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("editar_contacto", ["contacto" => (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 2, $this->source); })()), "codigo" => twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 2, $this->source); })()), "id", [], "any", false, false, false, 2)]), "html", null, true);
        echo "\"><strong>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 2, $this->source); })()), "nombre", [], "any", false, false, false, 2), "html", null, true);
        echo "</strong></a></li>
    <li><strong>Teléfono</strong>: ";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 3, $this->source); })()), "telefono", [], "any", false, false, false, 3), "html", null, true);
        echo "</li>
    <li><strong>E-mail</strong>: ";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 4, $this->source); })()), "email", [], "any", false, false, false, 4), "html", null, true);
        echo "</li>
    ";
        // line 5
        if (twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 5, $this->source); })()), "provincia", [], "any", false, false, false, 5)) {
            // line 6
            echo "    <li><strong>Provincia: </strong>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 6, $this->source); })()), "provincia", [], "any", false, false, false, 6), "nombre", [], "any", false, false, false, 6), "html", null, true);
            echo "</li>
    ";
        }
        // line 8
        echo "    <li><strong>Correo: </strong>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 8, $this->source); })()), "email", [], "any", false, false, false, 8), "html", null, true);
        echo "</li>
    <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("eliminar_contacto", ["contacto" => (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 9, $this->source); })()), "id" => twig_get_attribute($this->env, $this->source, (isset($context["contacto"]) || array_key_exists("contacto", $context) ? $context["contacto"] : (function () { throw new RuntimeError('Variable "contacto" does not exist.', 9, $this->source); })()), "id", [], "any", false, false, false, 9)]), "html", null, true);
        echo "\">Eliminar Contacto</a>
</ul>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "datos_contacto.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 9,  68 => 8,  62 => 6,  60 => 5,  56 => 4,  52 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<ul>
    <li><a href=\"{{ path('editar_contacto',{'contacto': contacto, 'codigo':contacto.id}) }}\"><strong>{{ contacto.nombre }}</strong></a></li>
    <li><strong>Teléfono</strong>: {{ contacto.telefono }}</li>
    <li><strong>E-mail</strong>: {{ contacto.email }}</li>
    {% if contacto.provincia %}
    <li><strong>Provincia: </strong>{{ contacto.provincia.nombre}}</li>
    {% endif %}
    <li><strong>Correo: </strong>{{ contacto.email}}</li>
    <a href=\"{{ path('eliminar_contacto',{'contacto': contacto, 'id':contacto.id}) }}\">Eliminar Contacto</a>
</ul>", "datos_contacto.html.twig", "/home/alumno/primeros-pasos/templates/datos_contacto.html.twig");
    }
}
