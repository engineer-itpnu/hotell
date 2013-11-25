<?php

/* HotelreserveBundle:masterEntity:show.html.twig */
class __TwigTemplate_629c9473cd3c1b19392f21b726fd7f2d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>masterEntity</h1>

    <table class=\"record_properties\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Accountstock</th>
                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "accountStock"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Accountchangevalue</th>
                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "accountChangeValue"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Accountstatus</th>
                <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "accountStatus"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Accountreqestdata</th>
                <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "accountReqestData"), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("master");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a href=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("master_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
            Edit
        </a>
    </li>
    <li>";
        // line 42
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "HotelreserveBundle:masterEntity:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 54,  237 => 103,  207 => 88,  202 => 86,  175 => 80,  170 => 72,  146 => 63,  70 => 39,  304 => 185,  301 => 184,  194 => 82,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 95,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 20,  134 => 57,  297 => 181,  84 => 28,  53 => 18,  65 => 24,  192 => 82,  185 => 76,  152 => 51,  34 => 5,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 88,  211 => 89,  206 => 82,  197 => 109,  188 => 88,  172 => 62,  153 => 66,  148 => 67,  97 => 37,  155 => 66,  113 => 51,  76 => 42,  127 => 56,  124 => 54,  90 => 40,  160 => 68,  137 => 62,  129 => 43,  118 => 50,  114 => 48,  110 => 50,  104 => 42,  100 => 41,  81 => 114,  77 => 33,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 118,  252 => 115,  247 => 78,  241 => 77,  229 => 115,  220 => 109,  214 => 69,  177 => 65,  169 => 60,  140 => 54,  132 => 55,  128 => 54,  107 => 44,  61 => 22,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 96,  224 => 71,  221 => 77,  219 => 94,  217 => 108,  208 => 68,  204 => 72,  179 => 82,  159 => 68,  143 => 60,  135 => 46,  119 => 30,  102 => 34,  71 => 26,  67 => 26,  63 => 11,  59 => 24,  38 => 6,  94 => 13,  89 => 30,  85 => 38,  75 => 25,  68 => 23,  56 => 20,  87 => 33,  21 => 2,  26 => 2,  93 => 36,  88 => 25,  78 => 42,  46 => 14,  27 => 3,  44 => 11,  31 => 4,  28 => 3,  201 => 110,  196 => 83,  183 => 68,  171 => 61,  166 => 59,  163 => 74,  158 => 73,  156 => 58,  151 => 68,  142 => 64,  138 => 58,  136 => 41,  121 => 52,  117 => 52,  105 => 49,  91 => 38,  62 => 21,  49 => 14,  24 => 1,  25 => 2,  19 => 1,  79 => 28,  72 => 24,  69 => 25,  47 => 18,  40 => 9,  37 => 8,  22 => 2,  246 => 90,  157 => 53,  145 => 47,  139 => 47,  131 => 58,  123 => 54,  120 => 40,  115 => 47,  111 => 37,  108 => 22,  101 => 48,  98 => 38,  96 => 40,  83 => 33,  74 => 30,  66 => 24,  55 => 20,  52 => 20,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 5,  209 => 112,  203 => 78,  199 => 67,  193 => 108,  189 => 107,  187 => 80,  182 => 105,  176 => 64,  173 => 79,  168 => 77,  164 => 69,  162 => 56,  154 => 58,  149 => 51,  147 => 61,  144 => 49,  141 => 48,  133 => 38,  130 => 64,  125 => 42,  122 => 59,  116 => 39,  112 => 47,  109 => 50,  106 => 44,  103 => 42,  99 => 45,  95 => 44,  92 => 42,  86 => 249,  82 => 31,  80 => 27,  73 => 26,  64 => 22,  60 => 22,  57 => 19,  54 => 20,  51 => 19,  48 => 19,  45 => 15,  42 => 10,  39 => 10,  36 => 9,  33 => 2,  30 => 5,);
    }
}
