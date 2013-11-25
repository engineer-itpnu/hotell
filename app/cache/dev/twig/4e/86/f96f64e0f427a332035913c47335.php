<?php

/* SensioDistributionBundle:Configurator:form.html.twig */
class __TwigTemplate_4e86f96f64e0f427a332035913c47335 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("form_div_layout.html.twig");

        $this->blocks = array(
            'form_rows' => array($this, 'block_form_rows'),
            'form_row' => array($this, 'block_form_row'),
            'form_label' => array($this, 'block_form_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_form_rows($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"symfony-form-errors\">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    </div>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 8
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["child"]) ? $context["child"] : $this->getContext($context, "child")), 'row');
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 12
    public function block_form_row($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"symfony-form-row\">
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'label');
        echo "
        <div class=\"symfony-form-field\">
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
            <div class=\"symfony-form-errors\">
                ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
            </div>
        </div>
    </div>
";
    }

    // line 24
    public function block_form_label($context, array $blocks = array())
    {
        // line 25
        echo "    ";
        if (twig_test_empty((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label")))) {
            // line 26
            echo "        ";
            $context["label"] = call_user_func_array($this->env->getFilter('humanize')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name"))));
            // line 27
            echo "    ";
        }
        // line 28
        echo "    <label for=\"";
        echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
        echo "\">
        ";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["label"]) ? $context["label"] : $this->getContext($context, "label"))), "html", null, true);
        echo "
        ";
        // line 30
        if ((isset($context["required"]) ? $context["required"] : $this->getContext($context, "required"))) {
            // line 31
            echo "            <span class=\"symfony-form-required\" title=\"This field is required\">*</span>
        ";
        }
        // line 33
        echo "    </label>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  356 => 328,  339 => 316,  295 => 275,  806 => 488,  803 => 487,  792 => 485,  788 => 484,  784 => 482,  771 => 481,  745 => 476,  742 => 475,  723 => 473,  706 => 472,  702 => 470,  698 => 469,  694 => 468,  690 => 467,  686 => 466,  682 => 465,  678 => 464,  675 => 463,  673 => 462,  656 => 461,  645 => 460,  630 => 455,  625 => 453,  621 => 452,  618 => 451,  616 => 450,  602 => 449,  565 => 414,  547 => 411,  530 => 410,  527 => 409,  525 => 408,  520 => 406,  515 => 404,  244 => 136,  389 => 160,  386 => 159,  378 => 157,  371 => 156,  367 => 155,  358 => 151,  345 => 147,  343 => 146,  340 => 145,  334 => 141,  331 => 140,  328 => 139,  326 => 138,  307 => 128,  302 => 125,  296 => 121,  293 => 120,  290 => 119,  281 => 114,  259 => 103,  253 => 100,  232 => 88,  210 => 77,  363 => 153,  357 => 123,  353 => 149,  344 => 318,  332 => 116,  327 => 114,  324 => 113,  321 => 135,  318 => 111,  306 => 107,  291 => 102,  288 => 118,  274 => 110,  265 => 105,  263 => 95,  255 => 101,  231 => 83,  212 => 78,  462 => 202,  449 => 198,  446 => 197,  441 => 196,  439 => 195,  431 => 189,  429 => 188,  422 => 184,  415 => 180,  408 => 176,  401 => 172,  394 => 168,  380 => 158,  373 => 156,  361 => 152,  351 => 120,  348 => 140,  342 => 317,  338 => 135,  335 => 134,  329 => 131,  325 => 129,  323 => 128,  320 => 127,  315 => 131,  303 => 106,  300 => 105,  289 => 113,  286 => 112,  275 => 105,  270 => 102,  267 => 101,  262 => 98,  256 => 96,  233 => 87,  181 => 65,  167 => 76,  20 => 1,  222 => 83,  200 => 72,  186 => 73,  213 => 78,  198 => 81,  184 => 63,  150 => 55,  216 => 79,  190 => 76,  180 => 70,  165 => 83,  126 => 63,  237 => 103,  207 => 75,  202 => 77,  175 => 58,  170 => 84,  146 => 63,  70 => 19,  304 => 185,  301 => 184,  194 => 68,  191 => 67,  161 => 63,  261 => 134,  248 => 97,  234 => 121,  226 => 84,  223 => 95,  215 => 115,  205 => 111,  178 => 59,  174 => 65,  58 => 15,  134 => 39,  297 => 276,  84 => 25,  53 => 11,  65 => 17,  192 => 82,  185 => 74,  152 => 46,  34 => 4,  350 => 211,  347 => 210,  276 => 111,  239 => 107,  236 => 106,  218 => 84,  211 => 89,  206 => 82,  197 => 69,  188 => 90,  172 => 57,  153 => 77,  148 => 69,  97 => 52,  155 => 47,  113 => 40,  76 => 28,  127 => 35,  124 => 62,  90 => 27,  160 => 68,  137 => 65,  129 => 64,  118 => 49,  114 => 59,  110 => 38,  104 => 31,  100 => 36,  81 => 24,  77 => 25,  23 => 3,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 199,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 164,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 150,  341 => 118,  337 => 103,  322 => 101,  314 => 99,  312 => 130,  309 => 129,  305 => 95,  298 => 120,  294 => 180,  285 => 89,  283 => 115,  278 => 98,  268 => 85,  264 => 84,  258 => 94,  252 => 115,  247 => 78,  241 => 93,  229 => 87,  220 => 81,  214 => 83,  177 => 67,  169 => 65,  140 => 58,  132 => 65,  128 => 60,  107 => 37,  61 => 23,  273 => 141,  269 => 107,  254 => 92,  243 => 92,  240 => 86,  238 => 122,  235 => 89,  230 => 120,  227 => 86,  224 => 81,  221 => 77,  219 => 93,  217 => 108,  208 => 76,  204 => 79,  179 => 84,  159 => 59,  143 => 51,  135 => 52,  119 => 40,  102 => 30,  71 => 23,  67 => 16,  63 => 21,  59 => 13,  38 => 5,  94 => 21,  89 => 30,  85 => 26,  75 => 22,  68 => 12,  56 => 12,  87 => 26,  21 => 2,  26 => 3,  93 => 28,  88 => 30,  78 => 24,  46 => 14,  27 => 7,  44 => 8,  31 => 3,  28 => 3,  201 => 110,  196 => 92,  183 => 71,  171 => 81,  166 => 54,  163 => 82,  158 => 80,  156 => 62,  151 => 59,  142 => 56,  138 => 69,  136 => 71,  121 => 50,  117 => 39,  105 => 25,  91 => 29,  62 => 14,  49 => 12,  24 => 2,  25 => 3,  19 => 1,  79 => 29,  72 => 18,  69 => 26,  47 => 9,  40 => 11,  37 => 7,  22 => 2,  246 => 96,  157 => 53,  145 => 74,  139 => 49,  131 => 45,  123 => 61,  120 => 31,  115 => 40,  111 => 47,  108 => 33,  101 => 33,  98 => 29,  96 => 35,  83 => 30,  74 => 22,  66 => 25,  55 => 12,  52 => 12,  50 => 10,  43 => 12,  41 => 7,  35 => 4,  32 => 6,  29 => 3,  209 => 112,  203 => 73,  199 => 93,  193 => 108,  189 => 66,  187 => 75,  182 => 87,  176 => 86,  173 => 85,  168 => 61,  164 => 69,  162 => 59,  154 => 60,  149 => 73,  147 => 75,  144 => 42,  141 => 73,  133 => 38,  130 => 46,  125 => 42,  122 => 41,  116 => 57,  112 => 39,  109 => 52,  106 => 51,  103 => 34,  99 => 23,  95 => 39,  92 => 31,  86 => 45,  82 => 25,  80 => 24,  73 => 23,  64 => 17,  60 => 20,  57 => 19,  54 => 19,  51 => 37,  48 => 10,  45 => 8,  42 => 7,  39 => 10,  36 => 5,  33 => 4,  30 => 3,);
    }
}
