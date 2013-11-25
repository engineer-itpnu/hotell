<?php

/* HotelreserveBundle:Default:HotelRollAccount.html.twig */
class __TwigTemplate_231bd7bab69773f9b8049090497d4d43 extends Twig_Template
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
        echo "    <section class=\"container\" style=\"width: 95%; margin-top: 50px; margin-bottom: 50px;\">
        <div class=\"span12 responsive\" data-tablet=\"span12 fix-margin\" data-desktop=\"span12\">
            <div class=\"\" style=\"border: 1px solid #4a8bc2;display: block;\">
                <div class=\"\" style=\"background: #4a8bc2;height: 36px;display: block;\">
                    <span class=\"\"
                          style=\"float: right;margin: 2px 0 0;padding: 6px 5px 6px 10px; margin-right: 5px; color: #fff; font-size: 14px;\">
                            <a href=\"\" class=\" icon-th-large\"></a>
                            <a href=\"\" class=\"icon-chevron-left\"></a> <strong>صفحه اصلی</strong>
                    </span>
                </div>
                <div class=\"\" style=\"display: block;padding: 25px 15px;\">
                    <div class=\"\">
                        <table class=\"table table-condensed\" style=\"width: 100%;\">
                            <tbody>
                            <table class=\"table table-bordered\" dir=\"rtl\">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>هتل</th>
                                    <th>آژانس</th>
                                    <th>مشتری</th>
                                    <th>اتاق رزروشده</th>
                                    <th>مبلغ(ریال)</th>
                                    <th>نوع</th>
                                    <th>موجودی هتل</th>
                                    <th>تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                ";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 40
            echo "                                    <tr>
                                        <td>
                                            <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("accountentity_show", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"), "html", null, true);
            echo "</a>
                                        </td>
                                        <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "hotelEntity"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "agencyEntity"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "customerEntity"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "reserveEntity"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 48
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "price"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "type"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "StockHotel"), "html", null, true);
            echo "</td>
                                        <td>";
            // line 51
            if ($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "DateTime")) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "DateTime"), "Y-m-d H:i:s"), "html", null, true);
            }
            echo "</td>
                                    </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "                                </tbody>
                            </table>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
";
    }

    public function getTemplateName()
    {
        return "HotelreserveBundle:Default:HotelRollAccount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 39,  304 => 185,  301 => 184,  194 => 82,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 118,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 20,  134 => 65,  297 => 181,  84 => 39,  53 => 12,  65 => 24,  192 => 42,  185 => 76,  152 => 51,  34 => 9,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 88,  211 => 113,  206 => 82,  197 => 109,  188 => 38,  172 => 62,  153 => 52,  148 => 56,  97 => 47,  155 => 72,  113 => 51,  76 => 111,  127 => 61,  124 => 54,  90 => 40,  160 => 59,  137 => 62,  129 => 60,  118 => 50,  114 => 55,  110 => 50,  104 => 42,  100 => 49,  81 => 114,  77 => 30,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 78,  241 => 77,  229 => 115,  220 => 109,  214 => 69,  177 => 65,  169 => 60,  140 => 54,  132 => 40,  128 => 36,  107 => 53,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 81,  224 => 71,  221 => 77,  219 => 117,  217 => 108,  208 => 68,  204 => 72,  179 => 8,  159 => 61,  143 => 45,  135 => 61,  119 => 30,  102 => 19,  71 => 32,  67 => 18,  63 => 11,  59 => 29,  38 => 6,  94 => 13,  89 => 45,  85 => 44,  75 => 33,  68 => 77,  56 => 26,  87 => 34,  21 => 2,  26 => 2,  93 => 46,  88 => 25,  78 => 42,  46 => 6,  27 => 3,  44 => 11,  31 => 3,  28 => 2,  201 => 110,  196 => 90,  183 => 68,  171 => 61,  166 => 59,  163 => 62,  158 => 73,  156 => 58,  151 => 63,  142 => 65,  138 => 44,  136 => 41,  121 => 57,  117 => 57,  105 => 49,  91 => 12,  62 => 17,  49 => 11,  24 => 1,  25 => 2,  19 => 1,  79 => 21,  72 => 32,  69 => 25,  47 => 17,  40 => 9,  37 => 8,  22 => 2,  246 => 90,  157 => 53,  145 => 47,  139 => 45,  131 => 60,  123 => 47,  120 => 31,  115 => 43,  111 => 37,  108 => 22,  101 => 48,  98 => 39,  96 => 37,  83 => 184,  74 => 40,  66 => 12,  55 => 20,  52 => 19,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 5,  209 => 112,  203 => 78,  199 => 67,  193 => 108,  189 => 107,  187 => 84,  182 => 105,  176 => 64,  173 => 63,  168 => 61,  164 => 57,  162 => 56,  154 => 58,  149 => 51,  147 => 67,  144 => 55,  141 => 48,  133 => 38,  130 => 64,  125 => 59,  122 => 59,  116 => 53,  112 => 55,  109 => 50,  106 => 41,  103 => 42,  99 => 45,  95 => 44,  92 => 44,  86 => 249,  82 => 37,  80 => 34,  73 => 26,  64 => 28,  60 => 10,  57 => 11,  54 => 8,  51 => 18,  48 => 18,  45 => 10,  42 => 5,  39 => 10,  36 => 9,  33 => 2,  30 => 5,);
    }
}
