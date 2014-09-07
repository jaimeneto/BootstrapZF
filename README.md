<h1>BootstrapZF</h1>

<p>BootstrapZF is a library for <a href="http://www.zendframework.com/manual/1.12/en/manual.html" target="_blank">Zend Framework 1</a> with components to create <a href="http://getbootstrap.com/" target="_blank">Bootstrap 3</a> elements.</p>

<h2 id="howtouse">How to use</h2>

- Download <strong>BootstrapZF</strong> and put the <code>library/Bootstrap</code> folder in your Zend Framework project's <code>library</code> folder;
- Download <strong>Bootstrap 3</strong> in <a href="http://getbootstrap.com/" target="_blank">http://getbootstrap.com</a> and put it in your Zend Framework project's <code>public</code> folder;
- Download <strong>Jquery</strong> in <a href="http://jquery.com/download/" target="_blank">http://jquery.com/download/</a> and put it in your Zend Framework project's <code>public</code> folder;
- Add to your <code>HTML</code> in <code>layout.phtml</code> the bootstrap and jquery css and js files. Something like:
<pre>
&lt;link href=&quot;&lt;?php echo $this-&gt;baseUrl('bootstrap/css/bootstrap.min.css'); ?&gt;&quot;
rel=&quot;stylesheet&quot;&gt;
&lt;script src=&quot;&lt;?php echo $this-&gt;baseUrl('jquery/1.11.1/jquery.min.js'); ?&gt;&quot;&gt;
&lt;/script&gt;
&lt;script src=&quot;&lt;?php echo $this-&gt;baseUrl('bootstrap/js/bootstrap.min.js'); ?&gt;&quot;&gt;
&lt;/script&gt;</pre>
- Add the following lines to your <code>application.ini</code>:
<pre>
autoloaderNamespaces[] = "Bootstrap"
resources.view.helperPath.Bootstrap_View_Helper = "Bootstrap/View/Helper"
resources.frontController.actionHelperPaths.Bootstrap_Controller_Action_Helper = 
"Bootstrap/Controller/Action/Helper"
</pre>
- Use the library classes in your project.


<h2 id="components">Components</h2>

<h3 id="alerts">Alerts</h3>

<p>Creates a <a href="http://getbootstrap.com/components/#alerts" target="_blank">Bootstrap's alert component</a> or a list of them.</p>

<h4>Bootstrap_View_Helper_Alert</h4>
<pre>
<span class="text-muted">/**
 * $text        The message you want to appear
 * $type        Can be alert [default], success, info, warning or danger
 * $closeButton Set false if you do not want the close button (X) appears
 * $escape      If you want to add html tags inside the message, set false
 * $tag         If you want to change the default tag (div) to any other
 */
</span>
<strong>&lt;?php echo $this-&gt;alert('&lt;strong&gt;Error! &lt;/strong&gt; An error occurred!', 'danger', 
false, false, 'p'); ?&gt;</strong></pre>

<h4>Bootstrap_Controller_Action_Helper_Alerts</h4>

<p>Add the messages in you controller action using the <code>Bootstrap_Controller_Action_Helper_Alerts</code></p>
<pre>
<span class="text-muted">/**
 * $text        The message you want to appear
 * $type        Can be alert [default], success, info, warning or danger
 * $escape      If you want to add html tags inside the message, set false
 */</span>
<span class="text-muted">//You can call the direct method</span>
<strong>$this-&gt;_helper-&gt;alerts('This is a direct message', 'success', true);</strong>
</strong> <span class="text-muted">//Or you can call the method AddMessage</span>
<strong>$this-&gt;getHelper('Alerts')-&gt;addMessage('This is a message.', 'alert', true);

<span class="text-muted">//Or you can call one of the methods for specific types of message</span>
<strong>$this-&gt;getHelper('Alerts')-&gt;addAlert('&lt;strong&gt;Alert: &lt;/strong&gt;This is an alert 
message', false);</strong>
<strong>$this-&gt;getHelper('Alerts')-&gt;addSuccess('&lt;strong&gt;Success: &lt;/strong&gt;This is a success 
message', false);</strong>
<strong>$this-&gt;getHelper('Alerts')-&gt;addInfo('&lt;strong&gt;Info: &lt;/strong&gt;This is an info message',
false);</strong>
<strong>$this-&gt;getHelper('Alerts')-&gt;addWarning('&lt;strong&gt;Success: &lt;/strong&gt;This is an warning
message', false);</strong>
<strong>$this-&gt;getHelper('Alerts')-&gt;addDanger('&lt;strong&gt;Success: &lt;/strong&gt;This is a danger 
message', false);</strong>
</pre>

<h4>Bootstrap_View_Helper_Alerts</h4>
<p>After adding the messages in the controller action with the <code>Bootstrap_Controller_Action_Helper_Alerts</code>, you call the <code>Bootstrap_View_Helper_Alerts</code> to show them:</p>
<pre>
<span class="text-muted">/**
 * $closeButton    Set false if you do not want the close button (X) appears
 * $uniqueMessages Set false if you do not want to equal messages to be filtered
 * $id             Set the &lt;ul&gt; id [default: 'alerts']
 */</span>
<strong>&lt;?php echo $this-&gt;alerts(true, true, 'messages'); ?&gt;</strong>
</pre>


<h3 id="carousel">Carousel</h3>

<p>Creates an image slideshow using <a href="http://getbootstrap.com/javascript/#carousel" target="_blank">Bootstrap's carousel component</a>.</p>

        <h4>Bootstrap_View_Helper_Carousel</h4>

<pre>
<strong>&lt;?php $images = array(
    array(
        'src'           =&gt; $this-&gt;view-&gt;baseUrl('img/carousel-1.jpg'),
        'caption-title' =&gt; 'First slide label',
        'caption'       =&gt; 'Nulla vitae elit libero, a pharetra augue mollis interdum',
        'alt'           =&gt; '900x500'
    ),
    array(
        'src'           =&gt; $this-&gt;view-&gt;baseUrl('img/carousel-2.jpg'),
        'caption-title' =&gt; 'Second slide label',
        'caption'       =&gt; 'Nulla vitae elit libero, a pharetra augue mollis interdum',
        'alt'           =&gt; '900x500'
    ),
    array(
        'src'           =&gt; $this-&gt;view-&gt;baseUrl('img/carousel-3.jpg'),
        'caption-title' =&gt; 'Third slide label',
        'caption'       =&gt; 'Nulla vitae elit libero, a pharetra augue mollis interdum',
        'alt'           =&gt; '900x500'
    ),    
);?&gt;</strong>

<span class="text-muted">/**
 * $id       Set the id for the div the wrappers the carousel
 * $images   Array contining the list of images with options 
 *           [src, caption-title, caption, alt]
 * $options  Array width boolean options [showCaption, showIndicators, 
 *           showControls], default is true for all of them
 */</span>
&lt;?php echo $this-&gt;carousel('generic_carousel', $images, array(
    'showCaption'    =&gt; true, 
    'showIndicators' =&gt; true,
    'showControls'   =&gt; true
)); ?&gt;</pre>


<h3 id="pagination">Pagination</h3>

<p>Creates a <a href="http://getbootstrap.com/components/#pagination" target="_blank">Bootstrap's pagination</a>.</p>

<h4>Bootstrap_View_Helper_Pagination</h4>
<pre>
<span class="text-muted">/**
 * $paginator   A Zend_Paginator object. Let it null if you have defined 
 *              a $this->paginator for the view
 * $pageParam   Set the name for the page parameter [default = 'page']
 * $size        Set small (or sm) or large (or lg) if you want to change 
 *              the default size
 */</span>
<strong>&lt;?php echo $this-&gt;pagination(null, 'p', 'sm'); ?&gt;</strong>
</pre>


<h3 id="navigation">Navigation</h3>

<p>Creates a <a href="http://getbootstrap.com/components/#navbar" target="_blank">Bootstrap's navbar</a>.</p>

<h4>Bootstrap_View_Helper_NavbarHeader</h4>
<pre>
<span class="text-muted">/**
 * $brand   Add the brand, site title or anything you want to be displayed in the 
 *          navbar
 * $target  Set the name of the navbar target for the navbar toggle be used on small 
 *          screens
 */</span>
<strong>&lt;?php echo $this-&gt;navbarHeader('BootstrapZF', 'navbar-collapse-1'); ?&gt;</strong>
</pre>

<h4>Bootstrap_View_Helper_Navbar</h4>
<pre>
<span class="text-muted">/**
 * $container   A Zend_Navigation_Container object. This is optional if you have 
                defined a default Zend_Navigation_Container in your project
 */</span>
<strong>&lt;?php 
$container = Zend_Registry::get('Zend_Navigation')-&gt;findById('homepage');
echo $this-&gt;navbar($container); 
?&gt;</strong>
</pre>

<p>Now, putting them together, with aditional html:</p>
<pre>
<strong>&lt;nav class=&quot;navbar navbar-default&quot; role=&quot;navigation&quot;&gt;
    &lt;div class=&quot;container-fluid&quot;&gt;
        &lt;?php echo $this-&gt;navbarHeader('BootstrapZF', 'navbar-collapse-1'); ?&gt;
        &lt;div class=&quot;collapse navbar-collapse&quot; id=&quot;navbar-collapse-1&quot;&gt;
            &lt;?php 
                $container = Zend_Registry::get('Zend_Navigation')-&gt;findById('home');
                echo $this-&gt;navbar($container); 
            ?&gt;
        &lt;/div&gt;&lt;!-- /.navbar-collapse --&gt;
    &lt;/div&gt;&lt;!-- /.container-fluid --&gt;
&lt;/nav&gt;</strong>
</pre>

        
<h3 id="breadcrumbs">Breadcrumbs</h3>

<p>Creates a <a href="http://getbootstrap.com/components/#breadcrumbs" target="_blank">Bootstrap's breadcrumbs</a>.</p>

<h4>Bootstrap_View_Helper_Breadcrumbs</h4>
<p>Once you have configured a default Zend_Navigation in your project, you just have to call the view helper.</p>
<pre>
<strong>&lt;?php echo $this-&gt;breadcrumbs(); ?&gt;</strong>
</pre>        
        
        
<h3 id="forms">Forms</h3>

<p>Creates a <a href="http://getbootstrap.com/css/#forms" target="_blank">Bootstrap's form</a>.</p>

<h4>Bootstrap_Form</h4>
<p>First, create a new form in your controller. You can choose between one of the following types of form:<p>
- <code>Bootstrap_Form_Vertical</code>, creates a <a href="http://getbootstrap.com/css/#forms-example" target="_blank">Bootstrap's default form</a>
- <code>Bootstrap_Form_Horizontal</code>, creates a <a href="http://getbootstrap.com/css/#forms-horizontal" target="_blank">Bootstrap's horizontal form</a>
- <code>Bootstrap_Form_Inline</code>, creates a <a href="http://getbootstrap.com/css/#forms-inline" target="_blank">Bootstrap's inline form</a>
<p> Elements text, password, textarea, checkbox, multiCheckbox, radio, select, button, reset, submit and file where rebuilt to fit bootstrap's format.</p>
<pre>
<strong>$form = new Bootstrap_Form_Horizontal();
    
$form->addElement('hidden', 'id', array('value' => 1));
$form->addElement('text', 'text', array('label' => 'Text', 'required' => true));
$form->addElement('password', 'password', array('label' => 'Password'));
$form->addElement('textarea', 'textarea', array('label' => 'Textarea', 'rows' => 5));
$form->addElement('checkbox', 'checkme', array('label' => 'Check or not check'));

$form->addElement('multiCheckbox', 'checkallme', array(
    'label'        => 'Many options', 
    'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
    'inline'       => true
));

$form->addElement('radio', 'radiobuttons', array(
    'label'        => 'Select one', 
    'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
    'inline'       => true
));

$form->addElement('select', 'selectme', array(
    'label'        => 'Select here', 
    'multiOptions' => array('Option 1', 'Option 2', 'Option 3'),
));

$form->addElement('button', 'back', array(
    'label'      => 'Back', 
    'buttonType' => 'default',
    'iconLeft'   => 'glyphicon glyphicon-circle-arrow-left'
));

$form->addElement('reset', 'reset', array(
    'label'      => 'Reset', 
    'buttonType' => 'default',
    'icon'       => 'glyphicon glyphicon-remove-circle'
));

$form->addElement('submit', 'submit', array(
    'label'      => 'Submit', 
    'buttonType' => 'primary', 
    'iconLeft'   => 'glyphicon glyphicon-floppy-disk'
));

$form->addDisplayGroup(array('back', 'reset', 'submit'), 'buttons');</strong>
</pre>   
        
        <p>New elements were created for new HTML5 form inputs.</p>
<pre>
<strong>$form->addElement('number', 'number', array(
    'label'       => 'Number',
    'min'         => 1,
    'max'         => 10
));

$form->addElement('range', 'range', array(
    'label'       => 'Range',
    'min'         => 1,
    'max'         => 5,
    'prepend'     => 1,
    'append'      => 5
));

$form->addElement('url', 'site', array('label' => 'Site'));
$form->addElement('email', 'email', array('label' => 'E-mail'));
$form->addElement('color', 'color', array('label' => 'Color'));
$form->addElement('date', 'date', array('label' => 'Date'));
$form->addElement('time', 'time', array('label' => 'Time'));
$form->addElement('datetime', 'datetime', array('label' => 'Datetime'));
$form->addElement('month', 'month', array('label' => 'Month'));
$form->addElement('week', 'week', array('label' => 'Week'));
$form->addElement('search', 'search', array('label' => 'Search'));
</strong></pre>   

<p>And a new element was created for <a href="http://getbootstrap.com/css/#forms-controls-static" target="_blank">Bootstrap's form static text</a>.</p>
        
<pre>
<strong>$form->addElement('staticText', 'uneditable', array(
    'label' => 'Static text', 
    'value' => 'You can not edit this text'
));
</strong></pre>

<p>Add the form the the view.</p>
<pre>
<strong>$this-&gt;view-&gt;form = $form;</strong>
</pre>      
    
<p>Now, print the form in your view and it will be rendered in bootstrap's format.</p>
<pre>
<strong>&lt;?php echo $this-&gt;form; ?&gt;</strong>
</pre>      
