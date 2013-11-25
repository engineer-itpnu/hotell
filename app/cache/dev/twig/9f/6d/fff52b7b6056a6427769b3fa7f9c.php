<?php

/* HotelreserveBundle:accountEntity:show.html.twig */
class __TwigTemplate_9f6dfff52b7b6056a6427769b3fa7f9c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["parent"]) ? $context["parent"] : $this->getContext($context, "parent")));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["parent"] = "";
        // line 2
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            // line 3
            $context["parent"] = "HotelreserveBundle::layout_admin.html.twig";
        } elseif ($this->env->getExtension('security')->isGranted("ROLE_HOTELDAR")) {
            // line 5
            $context["parent"] = "HotelreserveBundle::layout_hotel.html.twig";
        }
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
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
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>مبلغ : </th>
                <td>";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "price"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>نوع پرداخت : </th>
                <td>";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>موجودی هتل : </th>
                <td>";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "StockHotel"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>موجودی آژانس : </th>
                <td>";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "StockAgency"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>شماره پیگیری بانک : </th>
                <td>";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "NumberPey"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>تاریخ : </th>
                <td>";
        // line 48
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "DateTime"), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

        <ul class=\"record_actions\" style=\"list-style-type: none\">
    <li>
        <a class=\"btn btn-primary\" href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("accountentity");
        echo "\">
            Back to the list
        </a>
    </li>
</ul>
            </div>
        </div>
    </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "HotelreserveBundle:accountEntity:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 48,  155 => 72,  113 => 54,  76 => 36,  127 => 59,  124 => 58,  90 => 44,  160 => 74,  137 => 62,  129 => 60,  118 => 57,  114 => 55,  110 => 52,  104 => 51,  100 => 50,  81 => 45,  77 => 43,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 73,  220 => 70,  214 => 69,  177 => 65,  169 => 60,  140 => 55,  132 => 60,  128 => 59,  107 => 55,  61 => 13,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 75,  208 => 68,  204 => 72,  179 => 69,  159 => 61,  143 => 56,  135 => 61,  119 => 42,  102 => 50,  71 => 19,  67 => 15,  63 => 15,  59 => 14,  38 => 6,  94 => 48,  89 => 20,  85 => 25,  75 => 42,  68 => 14,  56 => 9,  87 => 46,  21 => 2,  26 => 6,  93 => 28,  88 => 47,  78 => 21,  46 => 7,  27 => 3,  44 => 12,  31 => 5,  28 => 3,  201 => 92,  196 => 90,  183 => 82,  171 => 61,  166 => 71,  163 => 62,  158 => 73,  156 => 66,  151 => 63,  142 => 65,  138 => 54,  136 => 56,  121 => 57,  117 => 56,  105 => 40,  91 => 47,  62 => 28,  49 => 19,  24 => 4,  25 => 2,  19 => 1,  79 => 43,  72 => 41,  69 => 32,  47 => 9,  40 => 8,  37 => 10,  22 => 2,  246 => 90,  157 => 56,  145 => 66,  139 => 45,  131 => 60,  123 => 47,  120 => 57,  115 => 43,  111 => 37,  108 => 52,  101 => 32,  98 => 49,  96 => 49,  83 => 40,  74 => 14,  66 => 15,  55 => 24,  52 => 21,  50 => 10,  43 => 8,  41 => 7,  35 => 5,  32 => 4,  29 => 3,  209 => 82,  203 => 78,  199 => 67,  193 => 73,  189 => 71,  187 => 84,  182 => 66,  176 => 64,  173 => 65,  168 => 72,  164 => 59,  162 => 57,  154 => 58,  149 => 51,  147 => 67,  144 => 49,  141 => 48,  133 => 61,  130 => 41,  125 => 59,  122 => 58,  116 => 55,  112 => 53,  109 => 52,  106 => 51,  103 => 50,  99 => 49,  95 => 48,  92 => 48,  86 => 28,  82 => 22,  80 => 44,  73 => 42,  64 => 17,  60 => 6,  57 => 11,  54 => 10,  51 => 14,  48 => 13,  45 => 17,  42 => 11,  39 => 10,  36 => 9,  33 => 7,  30 => 5,);
    }
}
