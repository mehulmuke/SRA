export default class {
    constructor(selector,breadcrumbsClass) {
        this.selector = selector;
        this.breadcrumbsClass = breadcrumbsClass;

        $.jstree.defaults.dnd.is_draggable  = false;
        $.jstree.defaults.dnd.touch = false; 
        $.jstree.defaults.dnd.copy = false;
        $.jstree.defaults.dnd.multiple = false;

        this.fetchCategoryTree();
        
        // On selecting a category.
        selector.on('select_node.jstree', (e, node) => {
            let id=node.selected[0];
            $('#ufto').val(id);
            this.breadcrumbs(id,selector,breadcrumbsClass);
            
        });
        
       // Expand categories when jstree is loaded.
        selector.on('loaded.jstree', () => {
            selector.jstree('open_all')
            selector.jstree('select_node', 'ul > li:first');
        });

        
    }
    
    breadcrumbs(id,selector,breadcrumbsClass) {
        let node=selector.jstree("get_selected", true);
        let separator =' <li class="separator"><i class="flaticon-right-arrow"></i></li> '
        
        let breadcrumb=selector.jstree().get_path(node[0], separator);
        let path=selector.jstree().get_path(node[0], '/');
        $('#uftop').val(window.btoa(path));
        $(this.breadcrumbsClass+" .upload-breadcrumbs > span#update").html(separator+breadcrumb);
        
        let url=window.route('admin.folders.download', {id: id, path: window.btoa(path)}).url();
        
        $(this.breadcrumbsClass+' .downloadFolder').attr('href',url);
        
    }
    
    fetchCategoryTree() {
        this.selector.jstree({
            core: {
                data: { url: route('admin.user-folder.tree') },
                check_callback: true,
            },
            plugins: ['dnd'],
            
        });
        
    }

    
}
