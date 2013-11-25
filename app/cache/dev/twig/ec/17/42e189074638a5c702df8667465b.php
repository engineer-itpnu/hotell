<?php

/* KnpPaginatorBundle:Pagination:twitter_bootstrap_pagination.html.twig */
class __TwigTemplate_ec1742e189074638a5c702df8667465b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 19
        echo "
";
        // line 20
        if (((isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")) > 1)) {
            // line 21
            echo "<div class=\"pagination\">
    <ul>

    ";
            // line 24
            if (array_key_exists("previous", $context)) {
                // line 25
                echo "        <li>
            <a href=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => (isset($context["previous"]) ? $context["previous"] : $this->getContext($context, "previous"))))), "html", null, true);
                echo "\">&laquo;&nbsp;";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Previous"), "html", null, true);
                echo "</a>
        </li>
    ";
            } else {
                // line 29
                echo "        <li class=\"disabled\">
            <span>&laquo;&nbsp;";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Previous"), "html", null, true);
                echo "</span>
        </li>
    ";
            }
            // line 33
            echo "
    ";
            // line 34
            if (((isset($context["startPage"]) ? $context["startPage"] : $this->getContext($context, "startPage")) > 1)) {
                // line 35
                echo "        <li>
            <a href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => 1))), "html", null, true);
                echo "\">1</a>
        </li>
        ";
                // line 38
                if (((isset($context["startPage"]) ? $context["startPage"] : $this->getContext($context, "startPage")) == 3)) {
                    // line 39
                    echo "            <li>
                <a href=\"";
                    // line 40
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => 2))), "html", null, true);
                    echo "\">2</a>
            </li>
        ";
                } elseif (((isset($context["startPage"]) ? $context["startPage"] : $this->getContext($context, "startPage")) != 2)) {
                    // line 43
                    echo "        <li class=\"disabled\">
            <span>&hellip;</span>
        </li>
        ";
                }
                // line 47
                echo "    ";
            }
            // line 48
            echo "
    ";
            // line 49
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["pagesInRange"]) ? $context["pagesInRange"] : $this->getContext($context, "pagesInRange")));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 50
                echo "        ";
                if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) != (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")))) {
                    // line 51
                    echo "            <li>
                <a href=\"";
                    // line 52
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page"))))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")), "html", null, true);
                    echo "</a>
            </li>
        ";
                } else {
                    // line 55
                    echo "            <li class=\"active\">
                <span>";
                    // line 56
                    echo twig_escape_filter($this->env, (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")), "html", null, true);
                    echo "</span>
            </li>
        ";
                }
                // line 59
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            echo "
    ";
            // line 62
            if (((isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")) > (isset($context["endPage"]) ? $context["endPage"] : $this->getContext($context, "endPage")))) {
                // line 63
                echo "        ";
                if (((isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")) > ((isset($context["endPage"]) ? $context["endPage"] : $this->getContext($context, "endPage")) + 1))) {
                    // line 64
                    echo "            ";
                    if (((isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")) > ((isset($context["endPage"]) ? $context["endPage"] : $this->getContext($context, "endPage")) + 2))) {
                        // line 65
                        echo "                <li class=\"disabled\">
                    <span>&hellip;</span>
                </li>
            ";
                    } else {
                        // line 69
                        echo "                <li>
                    <a href=\"";
                        // line 70
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => ((isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")) - 1)))), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, ((isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")) - 1), "html", null, true);
                        echo "</a>
                </li>
            ";
                    }
                    // line 73
                    echo "        ";
                }
                // line 74
                echo "        <li>
            <a href=\"";
                // line 75
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => (isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount"))))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["pageCount"]) ? $context["pageCount"] : $this->getContext($context, "pageCount")), "html", null, true);
                echo "</a>
        </li>
    ";
            }
            // line 78
            echo "
    ";
            // line 79
            if (array_key_exists("next", $context)) {
                // line 80
                echo "        <li>
            <a href=\"";
                // line 81
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route"]) ? $context["route"] : $this->getContext($context, "route")), twig_array_merge((isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), array((isset($context["pageParameterName"]) ? $context["pageParameterName"] : $this->getContext($context, "pageParameterName")) => (isset($context["next"]) ? $context["next"] : $this->getContext($context, "next"))))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next"), "html", null, true);
                echo "&nbsp;&raquo;</a>
        </li>
    ";
            } else {
                // line 84
                echo "        <li class=\"disabled\">
            <span>";
                // line 85
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Next"), "html", null, true);
                echo "&nbsp;&raquo;</span>
        </li>
    ";
            }
            // line 88
            echo "    </ul>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "KnpPaginatorBundle:Pagination:twitter_bootstrap_pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  20 => 1,  222 => 85,  200 => 78,  186 => 73,  213 => 85,  198 => 81,  184 => 71,  150 => 53,  216 => 92,  190 => 76,  180 => 70,  165 => 66,  126 => 63,  237 => 103,  207 => 88,  202 => 86,  175 => 75,  170 => 66,  146 => 63,  70 => 20,  304 => 185,  301 => 184,  194 => 75,  191 => 81,  161 => 57,  261 => 134,  248 => 127,  234 => 121,  226 => 114,  223 => 95,  215 => 115,  205 => 111,  178 => 103,  174 => 102,  58 => 18,  134 => 54,  297 => 181,  84 => 48,  53 => 18,  65 => 20,  192 => 82,  185 => 78,  152 => 74,  34 => 26,  350 => 211,  347 => 210,  276 => 142,  239 => 107,  236 => 106,  218 => 84,  211 => 89,  206 => 82,  197 => 109,  188 => 88,  172 => 62,  153 => 72,  148 => 56,  97 => 52,  155 => 75,  113 => 54,  76 => 22,  127 => 39,  124 => 62,  90 => 38,  160 => 68,  137 => 62,  129 => 64,  118 => 36,  114 => 59,  110 => 33,  104 => 31,  100 => 33,  81 => 47,  77 => 26,  23 => 3,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 91,  294 => 180,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 118,  252 => 115,  247 => 78,  241 => 77,  229 => 89,  220 => 109,  214 => 83,  177 => 67,  169 => 65,  140 => 54,  132 => 65,  128 => 51,  107 => 44,  61 => 25,  273 => 141,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 122,  235 => 74,  230 => 120,  227 => 98,  224 => 71,  221 => 77,  219 => 93,  217 => 108,  208 => 80,  204 => 79,  179 => 84,  159 => 59,  143 => 60,  135 => 52,  119 => 30,  102 => 41,  71 => 24,  67 => 20,  63 => 30,  59 => 36,  38 => 10,  94 => 51,  89 => 28,  85 => 38,  75 => 43,  68 => 26,  56 => 35,  87 => 49,  21 => 2,  26 => 2,  93 => 28,  88 => 38,  78 => 23,  46 => 13,  27 => 5,  44 => 41,  31 => 25,  28 => 3,  201 => 110,  196 => 82,  183 => 71,  171 => 81,  166 => 79,  163 => 78,  158 => 62,  156 => 61,  151 => 57,  142 => 56,  138 => 69,  136 => 53,  121 => 61,  117 => 45,  105 => 55,  91 => 50,  62 => 19,  49 => 14,  24 => 21,  25 => 3,  19 => 19,  79 => 25,  72 => 21,  69 => 40,  47 => 17,  40 => 11,  37 => 8,  22 => 20,  246 => 90,  157 => 53,  145 => 56,  139 => 45,  131 => 51,  123 => 54,  120 => 58,  115 => 49,  111 => 54,  108 => 56,  101 => 30,  98 => 33,  96 => 41,  83 => 24,  74 => 30,  66 => 39,  55 => 17,  52 => 16,  50 => 7,  43 => 12,  41 => 11,  35 => 6,  32 => 7,  29 => 24,  209 => 112,  203 => 78,  199 => 83,  193 => 108,  189 => 107,  187 => 80,  182 => 85,  176 => 69,  173 => 66,  168 => 80,  164 => 69,  162 => 64,  154 => 61,  149 => 73,  147 => 61,  144 => 55,  141 => 70,  133 => 38,  130 => 64,  125 => 48,  122 => 37,  116 => 48,  112 => 47,  109 => 50,  106 => 52,  103 => 34,  99 => 36,  95 => 42,  92 => 32,  86 => 27,  82 => 37,  80 => 29,  73 => 23,  64 => 38,  60 => 22,  57 => 19,  54 => 34,  51 => 33,  48 => 7,  45 => 30,  42 => 29,  39 => 7,  36 => 6,  33 => 5,  30 => 1,);
    }
}
