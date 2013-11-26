<?php

/* HotelreserveBundle:agencyEntity:show.html.twig */
class __TwigTemplate_a4355e31ccb92435f9b3509d2d15ad62 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("HotelreserveBundle::layout_admin.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "HotelreserveBundle::layout_admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<section class=\"container\"  style=\"width: 95%; margin-top: 20px; margin-bottom: 40px;\">
    <div class=\"span12 responsive\" data-tablet=\"span12 fix-margin\" data-desktop=\"span12\">
        <div class=\"\" style=\"border: 1px solid #4d3d98;display: block;\">
            <div class=\"\" style=\"background: #4d3d98;height: 36px;display: block;\">
                    <span class=\"\" style=\"float: right;margin: 2px 0 0;padding: 6px 5px 6px 10px; margin-right: 5px; color: #fff; font-size: 14px;\">
                            <a href=\"\" class=\" icon-th-large\"></a>
                            <a href=\"\" class=\"icon-chevron-left\"></a> <strong>نمایش اطلاعات پایه هتل</strong>
                    </span>
            </div>
            <div class=\"\" style=\"display: block;padding: 25px 15px;\">
                <table class=\"table table-condensed\" style=\"width: 100%;\">
                    <tbody>
        <tr>
            <th>ردیف</th>
            <td>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
        echo "</td>
        </tr>

        <tr>
            <th>نام آژانس : </th>
            <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "agencyname"), "html", null, true);
        echo "</td>
        </tr>
        </tbody>
    </table>

        <ul class=\"record_actions\" style=\"list-style-type: none\">
    <li>
        <a class=\"btn btn-primary\" href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("agencyentity");
        echo "\">
            Back to the list
        </a>
    </li>
    <li>
        <a class=\"btn btn-danger\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("agencyentity_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
            Edit
        </a>
    </li>
    <li>";
        // line 38
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
</ul>
                <form action=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("agencyentity_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\">
                    <input type=\"hidden\" name=\"_method\" value=\"DELETE\"/>
                    ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'widget');
        echo "
                </form>
            </div>
        </div>
    </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "HotelreserveBundle:agencyEntity:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 29,  192 => 42,  185 => 37,  152 => 57,  34 => 9,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 88,  211 => 84,  206 => 82,  197 => 44,  188 => 38,  172 => 62,  153 => 50,  148 => 56,  97 => 48,  155 => 72,  113 => 54,  76 => 32,  127 => 59,  124 => 50,  90 => 42,  160 => 59,  137 => 62,  129 => 60,  118 => 57,  114 => 55,  110 => 52,  104 => 51,  100 => 50,  81 => 141,  77 => 34,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 54,  132 => 52,  128 => 51,  107 => 46,  61 => 13,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 8,  159 => 61,  143 => 46,  135 => 61,  119 => 42,  102 => 20,  71 => 19,  67 => 17,  63 => 28,  59 => 21,  38 => 6,  94 => 14,  89 => 20,  85 => 40,  75 => 42,  68 => 27,  56 => 26,  87 => 46,  21 => 2,  26 => 6,  93 => 28,  88 => 32,  78 => 25,  46 => 7,  27 => 3,  44 => 12,  31 => 3,  28 => 2,  201 => 92,  196 => 90,  183 => 68,  171 => 61,  166 => 71,  163 => 62,  158 => 73,  156 => 58,  151 => 63,  142 => 65,  138 => 44,  136 => 53,  121 => 57,  117 => 56,  105 => 44,  91 => 13,  62 => 28,  49 => 19,  24 => 4,  25 => 2,  19 => 1,  79 => 43,  72 => 41,  69 => 30,  47 => 17,  40 => 8,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 66,  139 => 45,  131 => 60,  123 => 47,  120 => 49,  115 => 43,  111 => 37,  108 => 52,  101 => 52,  98 => 39,  96 => 37,  83 => 37,  74 => 106,  66 => 25,  55 => 22,  52 => 21,  50 => 8,  43 => 11,  41 => 7,  35 => 5,  32 => 8,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 61,  164 => 60,  162 => 56,  154 => 58,  149 => 51,  147 => 67,  144 => 55,  141 => 48,  133 => 61,  130 => 41,  125 => 59,  122 => 58,  116 => 48,  112 => 47,  109 => 24,  106 => 51,  103 => 42,  99 => 49,  95 => 43,  92 => 48,  86 => 276,  82 => 35,  80 => 38,  73 => 34,  64 => 17,  60 => 27,  57 => 11,  54 => 9,  51 => 13,  48 => 13,  45 => 15,  42 => 6,  39 => 10,  36 => 4,  33 => 3,  30 => 5,);
    }
}
