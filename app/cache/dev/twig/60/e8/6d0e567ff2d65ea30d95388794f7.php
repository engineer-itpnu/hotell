<?php

/* HotelreserveBundle:reserveEntity:edit.html.twig */
class __TwigTemplate_60e86d0e567ff2d65ea30d95388794f7 extends Twig_Template
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
                            <a href=\"\" class=\"icon-chevron-left\"></a> <strong>ویرایش اطلاعات پایه ای هتل ها</strong>
                    </span>
                </div>
                <div class=\"\" style=\"display: block;padding: 25px 15px;\">
                    <div class=\"\">
                        <table class=\"table table-condensed\" style=\"width: 100%;\">
                            <tbody>

                            <tbody>
                            <form action=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("reserveentity_update", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id"))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), 'enctype');
        echo ">
                                <input type=\"hidden\" name=\"_method\" value=\"PUT\"/>

                                <tr class=\"success\">
                                    <td>
                                        ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "DateInp"), 'label', array("label" => "تاریخ ورود مسافر :"));
        echo "</td><td>
                                        ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "DateInp"), 'errors');
        echo "
                                        ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "DateInp"), 'widget');
        echo " </td><td></td></td><td></tr>
                                <tr class=\"info\">
                                    <td>
                                        ";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "CountNight"), 'label', array("label" => "تعداد شب اقامت : "));
        echo "</td><td>
                                        ";
        // line 29
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "CountNight"), 'errors');
        echo "
                                        ";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "CountNight"), 'widget');
        echo "
                                    </td>
                                    <td>
                                        ";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "Money"), 'label', array("label" => "جمع هزینه اقامت : "));
        echo "</td><td>
                                        ";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "Money"), 'errors');
        echo "
                                        ";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "Money"), 'widget');
        echo "
                                    </td>

                                </tr>
                                <tr class=\"success\">
                                    <td>
                                        ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "CodePey"), 'label', array("label" => "کد پیگیری : "));
        echo "</td><td>
                                        ";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "CodePey"), 'errors');
        echo "
                                        ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "CodePey"), 'widget');
        echo "
                                    </td>
                                    <td>
                                        ";
        // line 46
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "Voucher"), 'label', array("label" => "واچر : "));
        echo "</td><td>
                                        ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "Voucher"), 'errors');
        echo "
                                        ";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "Voucher"), 'widget');
        echo "
                                    </td>

                                </tr>
                                <tr class=\"info\">
                                    <td>
                                        ";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "customerEntity"), 'label', array("label" => "نام مشتری : "));
        echo "</td><td>
                                        ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "customerEntity"), 'errors');
        echo "
                                        ";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "customerEntity"), 'widget');
        echo "
                                    </td>
                                    <td>
                                        ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "agencyEntity"), 'label', array("label" => "نام آژانس : "));
        echo "</td><td>
                                        ";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "agencyEntity"), 'errors');
        echo "
                                        ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "agencyEntity"), 'widget');
        echo "
                                    </td>
                                </tr>

                                ";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["edit_form"]) ? $context["edit_form"] : $this->getContext($context, "edit_form")), "_token"), 'widget');
        echo "
                                <ul style=\"list-style-type: none\"><li>
                                        <button class=\"btn btn-success tabs-right\" type=\"submit\" style=\"margin-right: 400px\">ویرایش</button></li></ul>
                            </form>
                            <tr class=\"record_actions\" style=\"list-style-type: none\">
                                <td><a class=\"btn btn-primary\" href=\"";
        // line 70
        echo $this->env->getExtension('routing')->getPath("reserveentity");
        echo "\">برگشت </a></td>


                            </tr>
                            <td>
                                ";
        // line 75
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</td>
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
        return "HotelreserveBundle:reserveEntity:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 85,  200 => 78,  186 => 73,  213 => 85,  198 => 76,  184 => 71,  150 => 60,  216 => 92,  190 => 74,  180 => 70,  165 => 66,  126 => 54,  237 => 103,  207 => 88,  202 => 86,  175 => 75,  170 => 66,  146 => 63,  70 => 26,  304 => 185,  301 => 184,  194 => 75,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 95,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 23,  134 => 54,  297 => 181,  84 => 28,  53 => 18,  65 => 24,  192 => 82,  185 => 78,  152 => 60,  34 => 5,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 84,  211 => 89,  206 => 82,  197 => 109,  188 => 88,  172 => 62,  153 => 72,  148 => 59,  97 => 37,  155 => 60,  113 => 54,  76 => 29,  127 => 57,  124 => 47,  90 => 34,  160 => 68,  137 => 62,  129 => 43,  118 => 44,  114 => 43,  110 => 54,  104 => 39,  100 => 38,  81 => 34,  77 => 27,  23 => 1,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 118,  252 => 115,  247 => 78,  241 => 77,  229 => 89,  220 => 109,  214 => 83,  177 => 67,  169 => 65,  140 => 56,  132 => 49,  128 => 48,  107 => 42,  61 => 22,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 98,  224 => 71,  221 => 77,  219 => 93,  217 => 108,  208 => 80,  204 => 79,  179 => 75,  159 => 61,  143 => 60,  135 => 52,  119 => 30,  102 => 41,  71 => 38,  67 => 26,  63 => 22,  59 => 21,  38 => 6,  94 => 35,  89 => 46,  85 => 38,  75 => 40,  68 => 23,  56 => 21,  87 => 31,  21 => 2,  26 => 2,  93 => 47,  88 => 38,  78 => 28,  46 => 14,  27 => 3,  44 => 11,  31 => 3,  28 => 2,  201 => 110,  196 => 82,  183 => 68,  171 => 70,  166 => 65,  163 => 65,  158 => 62,  156 => 61,  151 => 68,  142 => 56,  138 => 55,  136 => 55,  121 => 47,  117 => 46,  105 => 49,  91 => 32,  62 => 24,  49 => 14,  24 => 1,  25 => 2,  19 => 1,  79 => 42,  72 => 28,  69 => 25,  47 => 17,  40 => 9,  37 => 8,  22 => 2,  246 => 90,  157 => 53,  145 => 56,  139 => 53,  131 => 51,  123 => 54,  120 => 57,  115 => 47,  111 => 43,  108 => 53,  101 => 48,  98 => 38,  96 => 47,  83 => 30,  74 => 30,  66 => 25,  55 => 20,  52 => 20,  50 => 7,  43 => 11,  41 => 7,  35 => 6,  32 => 8,  29 => 5,  209 => 112,  203 => 78,  199 => 83,  193 => 108,  189 => 107,  187 => 80,  182 => 105,  176 => 69,  173 => 66,  168 => 77,  164 => 69,  162 => 64,  154 => 61,  149 => 57,  147 => 61,  144 => 57,  141 => 55,  133 => 38,  130 => 64,  125 => 48,  122 => 59,  116 => 56,  112 => 55,  109 => 50,  106 => 43,  103 => 41,  99 => 48,  95 => 42,  92 => 42,  86 => 33,  82 => 43,  80 => 30,  73 => 26,  64 => 23,  60 => 22,  57 => 24,  54 => 20,  51 => 19,  48 => 18,  45 => 15,  42 => 11,  39 => 10,  36 => 9,  33 => 7,  30 => 5,);
    }
}
