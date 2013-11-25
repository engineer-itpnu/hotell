<?php

/* HotelreserveBundle:bankEntity:edit.html.twig */
class __TwigTemplate_c60353d5d30df33899fefe75fa89d8d3 extends Twig_Template
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
        echo "<h1>bankEntity edit</h1>

    ";
        // line 6
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'form');
        echo "

        <ul class=\"record_actions\">
    <li>
        <a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("bankentity");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>";
        // line 14
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "HotelreserveBundle:bankEntity:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 29,  192 => 42,  185 => 37,  152 => 57,  34 => 9,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 88,  211 => 84,  206 => 82,  197 => 44,  188 => 38,  172 => 62,  153 => 50,  148 => 56,  97 => 48,  155 => 72,  113 => 54,  76 => 32,  127 => 59,  124 => 50,  90 => 42,  160 => 59,  137 => 62,  129 => 60,  118 => 57,  114 => 55,  110 => 52,  104 => 51,  100 => 50,  81 => 141,  77 => 34,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 54,  132 => 52,  128 => 51,  107 => 46,  61 => 13,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 8,  159 => 61,  143 => 46,  135 => 61,  119 => 42,  102 => 20,  71 => 19,  67 => 17,  63 => 28,  59 => 21,  38 => 6,  94 => 14,  89 => 20,  85 => 40,  75 => 42,  68 => 27,  56 => 26,  87 => 46,  21 => 2,  26 => 6,  93 => 28,  88 => 32,  78 => 25,  46 => 7,  27 => 3,  44 => 12,  31 => 4,  28 => 3,  201 => 92,  196 => 90,  183 => 68,  171 => 61,  166 => 71,  163 => 62,  158 => 73,  156 => 58,  151 => 63,  142 => 65,  138 => 44,  136 => 53,  121 => 57,  117 => 56,  105 => 44,  91 => 13,  62 => 28,  49 => 14,  24 => 4,  25 => 2,  19 => 1,  79 => 43,  72 => 41,  69 => 30,  47 => 17,  40 => 8,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 66,  139 => 45,  131 => 60,  123 => 47,  120 => 49,  115 => 43,  111 => 37,  108 => 52,  101 => 52,  98 => 39,  96 => 37,  83 => 37,  74 => 106,  66 => 25,  55 => 22,  52 => 21,  50 => 8,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 61,  164 => 60,  162 => 56,  154 => 58,  149 => 51,  147 => 67,  144 => 55,  141 => 48,  133 => 61,  130 => 41,  125 => 59,  122 => 58,  116 => 48,  112 => 47,  109 => 24,  106 => 51,  103 => 42,  99 => 49,  95 => 43,  92 => 48,  86 => 276,  82 => 35,  80 => 38,  73 => 34,  64 => 17,  60 => 27,  57 => 11,  54 => 9,  51 => 13,  48 => 13,  45 => 15,  42 => 10,  39 => 10,  36 => 4,  33 => 3,  30 => 5,);
    }
}
