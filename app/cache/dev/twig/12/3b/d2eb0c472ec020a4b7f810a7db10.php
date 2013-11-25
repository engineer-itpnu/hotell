<?php

/* HotelreserveBundle:reserveEntity:show.html.twig */
class __TwigTemplate_123bd2eb0c472ec020a4b7f810a7db10 extends Twig_Template
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
            <th>ردیف : </th>
            <td>";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>تاریخ ورود مسافر : </th>
            <td>";
        // line 21
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "DateInp"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>تعداد شب اقامت : </th>
            <td>";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "CountNight"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>جمع هزینه اقامت : </th>
            <td>";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "Money"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>کد پیگیری : </th>
            <td>";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "CodePey"), "html", null, true);
        echo "</td>
        </tr>
        <tr>
            <th>واچر : </th>
            <td>";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "Voucher"), "html", null, true);
        echo "</td>
        </tr>
        </tbody>
    </table>

                <ul class=\"record_actions\" style=\"list-style-type: none\">
    <li>
        <a class=\"btn btn-primary\" href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("reserveentity");
        echo "\">
            برگشت
        </a>
    </li>
    <li>
        <a class=\"btn btn-danger\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reserveentity_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\">
            ویرایش
        </a>
    </li>
    <li>";
        // line 53
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
</ul>
                <form action=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reserveentity_delete", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\">
                    <input type=\"hidden\" name=\"_method\" value=\"DELETE\"/>
                    ";
        // line 57
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
        return "HotelreserveBundle:reserveEntity:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 85,  200 => 78,  186 => 73,  213 => 85,  198 => 76,  184 => 71,  150 => 60,  216 => 92,  190 => 74,  180 => 70,  165 => 66,  126 => 54,  237 => 103,  207 => 88,  202 => 86,  175 => 75,  170 => 66,  146 => 63,  70 => 26,  304 => 185,  301 => 184,  194 => 75,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 95,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 23,  134 => 54,  297 => 181,  84 => 28,  53 => 18,  65 => 24,  192 => 82,  185 => 78,  152 => 60,  34 => 5,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 84,  211 => 89,  206 => 82,  197 => 109,  188 => 88,  172 => 62,  153 => 72,  148 => 59,  97 => 40,  155 => 60,  113 => 54,  76 => 29,  127 => 57,  124 => 47,  90 => 31,  160 => 68,  137 => 62,  129 => 43,  118 => 44,  114 => 43,  110 => 54,  104 => 39,  100 => 49,  81 => 34,  77 => 27,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 118,  252 => 115,  247 => 78,  241 => 77,  229 => 89,  220 => 109,  214 => 83,  177 => 67,  169 => 65,  140 => 56,  132 => 49,  128 => 48,  107 => 53,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 98,  224 => 71,  221 => 77,  219 => 93,  217 => 108,  208 => 80,  204 => 79,  179 => 75,  159 => 61,  143 => 60,  135 => 52,  119 => 30,  102 => 41,  71 => 24,  67 => 26,  63 => 30,  59 => 29,  38 => 6,  94 => 32,  89 => 46,  85 => 38,  75 => 33,  68 => 29,  56 => 21,  87 => 31,  21 => 2,  26 => 2,  93 => 47,  88 => 38,  78 => 33,  46 => 14,  27 => 3,  44 => 11,  31 => 3,  28 => 2,  201 => 110,  196 => 82,  183 => 68,  171 => 70,  166 => 65,  163 => 65,  158 => 62,  156 => 61,  151 => 68,  142 => 56,  138 => 55,  136 => 55,  121 => 47,  117 => 57,  105 => 49,  91 => 32,  62 => 21,  49 => 14,  24 => 1,  25 => 2,  19 => 1,  79 => 42,  72 => 32,  69 => 25,  47 => 17,  40 => 9,  37 => 8,  22 => 2,  246 => 90,  157 => 53,  145 => 56,  139 => 53,  131 => 51,  123 => 54,  120 => 57,  115 => 49,  111 => 43,  108 => 53,  101 => 48,  98 => 33,  96 => 47,  83 => 30,  74 => 30,  66 => 22,  55 => 20,  52 => 20,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 5,  209 => 112,  203 => 78,  199 => 83,  193 => 108,  189 => 107,  187 => 80,  182 => 105,  176 => 69,  173 => 66,  168 => 77,  164 => 69,  162 => 64,  154 => 61,  149 => 57,  147 => 61,  144 => 57,  141 => 55,  133 => 38,  130 => 64,  125 => 48,  122 => 59,  116 => 56,  112 => 55,  109 => 50,  106 => 43,  103 => 43,  99 => 48,  95 => 42,  92 => 44,  86 => 35,  82 => 37,  80 => 27,  73 => 26,  64 => 23,  60 => 22,  57 => 19,  54 => 21,  51 => 19,  48 => 18,  45 => 15,  42 => 11,  39 => 10,  36 => 9,  33 => 7,  30 => 5,);
    }
}
